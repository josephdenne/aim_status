# Aim Status

* Version: 1.1
* Author: [Joseph Denne](mailto:me@josephdenne.com)
* Build Date: 29th August 2010
* GitHub Repository: [http://github.com/josephdenne/aim_status/tree/master](http://github.com/josephdenne/aim_status/tree/master)
* Requirements: Symphony 2.0.7

## Summary

Gets an AIM users online status.

![The end result](http://josephdenne.com/workspace/images/screenshots/aim-status/end-result.png)

## Installation

1. Upload the `aim_status` folder in this archive to your Symphony `extensions` folder

2. Enable it by selecting `Aim Status`, choose Enable from the with-selected menu, then click Apply.

## Example

	<?xml version="1.0" encoding="UTF-8"?>
	<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
		xmlns:php="http://php.net/xsl"
		exclude-result-prefixes="php">

	<xsl:output method="xml"
		doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN"
		doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"
		omit-xml-declaration="yes"
		encoding="UTF-8"
		indent="yes" />

	<xsl:template match="/">

	<html>
		<head>
			<title>My Aim status</title>
		</head>
		<body>
			<xsl:param name="aimstatus" select="php:functionString('aimstatus', 'joseph.denne@mac.com')" />
			<xsl:choose>
				<xsl:when test="$aimstatus = 'true'">
					<img src="/extensions/aim_status/assets/ichat-online.gif" title="iChat status: user online" alt="User online" id="ichat" /> <a href="aim:joseph.denne@mac.com">joseph.denne@mac.com</a>
				</xsl:when>
				<xsl:otherwise>
					<img src="/extensions/aim_status/assets/ichat-offline.gif" title="iChat status: user offline" alt="User offline" id="ichat" /><a href="aim:joseph.denne@mac.com">joseph.denne@mac.com</a>
				</xsl:otherwise>
			</xsl:choose>
		</body>
	</html>

	</xsl:template>

	</xsl:stylesheet>

Rock on.