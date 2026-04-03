<?php
/**
 * Split long treatment HTML into segments for the service details layout.
 * Loaded from treatment-html.php (sanitize_* helpers must exist).
 */

if (!function_exists('service_split_rich_content')) {
    /**
     * @param string $html
     * @param int $minPlainLen
     * @return array<string, mixed>
     */
    function service_split_rich_content($html, $minPlainLen = 1500) {
        $html = sanitize_treatment_editor_html((string) $html);
        if ($html === '') {
            return ['part1' => '', 'part2' => '', 'part3' => '', 'expand_first' => false];
        }

        $plain = preg_replace('/\s+/u', ' ', strip_tags($html));
        $plainLen = strlen($plain);
        $isRich = (bool) preg_match('/<[^>]+>/', $html);

        if (!$isRich) {
            $body = nl2br(htmlspecialchars($html, ENT_QUOTES, 'UTF-8'));
            return [
                'part1' => $body,
                'part2' => '',
                'part3' => '',
                'expand_first' => $plainLen > 1100,
            ];
        }

        if ($plainLen < $minPlainLen) {
            return [
                'part1' => $html,
                'part2' => '',
                'part3' => '',
                'expand_first' => $plainLen > 1000,
            ];
        }

        libxml_use_internal_errors(true);
        $dom = new DOMDocument('1.0', 'UTF-8');
        $wrapped = '<?xml encoding="UTF-8"><div id="__svc_split">' . $html . '</div>';
        $dom->loadHTML($wrapped, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $root = $dom->getElementById('__svc_split');
        if (!$root) {
            return [
                'part1' => $html,
                'part2' => '',
                'part3' => '',
                'expand_first' => $plainLen > 1000,
            ];
        }

        $nodes = [];
        foreach ($root->childNodes as $child) {
            if ($child->nodeType === XML_TEXT_NODE && trim($child->textContent) === '') {
                continue;
            }
            $nodes[] = $child;
        }

        if (count($nodes) === 1 && $nodes[0]->nodeType === XML_ELEMENT_NODE && strtolower($nodes[0]->nodeName) === 'div') {
            $inner = [];
            foreach ($nodes[0]->childNodes as $ch) {
                if ($ch->nodeType === XML_TEXT_NODE && trim($ch->textContent) === '') {
                    continue;
                }
                $inner[] = $ch;
            }
            if (count($inner) >= 2) {
                $nodes = $inner;
            }
        }

        if (count($nodes) < 2) {
            return [
                'part1' => $html,
                'part2' => '',
                'part3' => '',
                'expand_first' => $plainLen > 1000,
            ];
        }

        $blocks = [];
        $current = [];
        foreach ($nodes as $node) {
            if ($node->nodeType === XML_ELEMENT_NODE && preg_match('/^h[1-6]$/i', $node->nodeName)) {
                if (!empty($current)) {
                    $blocks[] = $current;
                }
                $current = [$node];
            } else {
                $current[] = $node;
            }
        }
        if (!empty($current)) {
            $blocks[] = $current;
        }

        if (count($blocks) < 2) {
            $blocks = [];
            foreach ($nodes as $node) {
                $blocks[] = [$node];
            }
        }

        $t1 = (int) max(450, $plainLen * 0.34);
        $t2 = (int) max(400, $plainLen * 0.32);
        $seg = ['', '', ''];
        $counts = [0, 0, 0];
        $bucket = 0;

        foreach ($blocks as $blockNodes) {
            $chunk = '';
            foreach ($blockNodes as $n) {
                $chunk .= $dom->saveHTML($n);
            }
            $len = strlen(preg_replace('/\s+/u', ' ', strip_tags($chunk)));
            if ($bucket === 0 && $counts[0] >= $t1 && $len > 0) {
                $bucket = 1;
            } elseif ($bucket === 1 && $counts[1] >= $t2 && $len > 0) {
                $bucket = 2;
            }
            $seg[$bucket] .= $chunk;
            $counts[$bucket] += $len;
        }

        $seg[0] = trim($seg[0]);
        $seg[1] = trim($seg[1]);
        $seg[2] = trim($seg[2]);

        if ($seg[1] === '' && $seg[2] !== '') {
            $seg[1] = $seg[2];
            $seg[2] = '';
        }

        if ($seg[1] === '' && $seg[2] === '') {
            return [
                'part1' => $html,
                'part2' => '',
                'part3' => '',
                'expand_first' => $plainLen > 1000,
            ];
        }

        $p1plain = strlen(preg_replace('/\s+/u', ' ', strip_tags($seg[0])));
        return [
            'part1' => $seg[0],
            'part2' => $seg[1],
            'part3' => $seg[2],
            'expand_first' => $p1plain > 900,
        ];
    }
}
