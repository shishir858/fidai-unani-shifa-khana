<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns:sm="http://www.sitemaps.org/schemas/sitemap/0.9">
  <xsl:output method="html" indent="yes" encoding="UTF-8"/>

  <xsl:template match="/">
    <html>
      <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>XML Sitemap</title>
        <style>
          body{font-family:Arial,sans-serif;background:#f4f6f8;margin:0;padding:24px;color:#222}
          .wrap{max-width:980px;margin:0 auto;background:#fff;border:1px solid #d9e0e6;border-radius:10px;padding:24px}
          h1{margin:0 0 8px 0}
          p{margin:0 0 16px 0;color:#555}
          table{width:100%;border-collapse:collapse}
          th,td{border:1px solid #e1e7ec;padding:10px;text-align:left;vertical-align:top}
          th{background:#f0f4f7}
          a{color:#0b6fa4;text-decoration:none}
          a:hover{text-decoration:underline}
        </style>
      </head>
      <body>
        <div class="wrap">
          <h1>XML Sitemap</h1>
          <p>
            <xsl:choose>
              <xsl:when test="sm:sitemapindex">This is a Sitemap Index file.</xsl:when>
              <xsl:otherwise>This is a URL Sitemap file.</xsl:otherwise>
            </xsl:choose>
          </p>
          <table>
            <thead>
              <tr>
                <th>URL</th>
                <th>Last Modified</th>
              </tr>
            </thead>
            <tbody>
              <xsl:choose>
                <xsl:when test="sm:sitemapindex">
                  <xsl:for-each select="sm:sitemapindex/sm:sitemap">
                    <tr>
                      <td><a href="{sm:loc}"><xsl:value-of select="sm:loc"/></a></td>
                      <td><xsl:value-of select="sm:lastmod"/></td>
                    </tr>
                  </xsl:for-each>
                </xsl:when>
                <xsl:otherwise>
                  <xsl:for-each select="sm:urlset/sm:url">
                    <tr>
                      <td><a href="{sm:loc}"><xsl:value-of select="sm:loc"/></a></td>
                      <td><xsl:value-of select="sm:lastmod"/></td>
                    </tr>
                  </xsl:for-each>
                </xsl:otherwise>
              </xsl:choose>
            </tbody>
          </table>
        </div>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>

