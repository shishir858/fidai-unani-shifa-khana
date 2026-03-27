<?php
/**
 * Helpers for treatment rich-text (admin editor + public display).
 */
if (!function_exists('sanitize_treatment_editor_html')) {
    function sanitize_treatment_editor_html($html) {
        if ($html === null || $html === '') {
            return '';
        }
        $html = (string) $html;
        $html = preg_replace('/<\s*script\b[^>]*>[\s\S]*?<\s*\/\s*script\s*>/i', '', $html);
        $html = preg_replace('/<\s*style\b[^>]*>[\s\S]*?<\s*\/\s*style\s*>/i', '', $html);
        $html = preg_replace('/<\s*(iframe|object|embed|form|input|textarea|select|button|link|meta|base)\b[^>]*>[\s\S]*?<\s*\/\s*\1\s*>/i', '', $html);
        $html = preg_replace('/<\s*(iframe|object|embed|link|meta|base)\b[^>]*\/?>/i', '', $html);
        $html = preg_replace('/\s+on\w+\s*=\s*(["\']).*?\1/iu', '', $html);
        $html = preg_replace('/\s+on\w+\s*=\s*[^\s>]*/iu', '', $html);
        $html = preg_replace('/javascript\s*:/iu', 'blocked:', $html);
        return trim($html);
    }

    function treatment_editor_textarea_value($html) {
        return str_ireplace('</textarea>', '&lt;/textarea&gt;', (string) $html);
    }

    /** Plain text (no tags) from old records: keep line breaks; rich HTML passes through as-is. */
    function format_treatment_body_html($html) {
        $html = sanitize_treatment_editor_html($html);
        if ($html === '') {
            return '';
        }
        if (preg_match('/<[^>]+>/', $html)) {
            return $html;
        }
        return nl2br(htmlspecialchars($html, ENT_QUOTES, 'UTF-8'));
    }

    function format_treatment_short_html($html) {
        return format_treatment_body_html($html);
    }
}
