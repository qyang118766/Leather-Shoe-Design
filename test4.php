<?


$file = fopen ("http://wcadmin:ptc@18.162.55.28/Windchill/ordersram/ordersdata.txt", "r");
if (!$file) {
    echo "<p>Unable to open remote file for writing.\n";
    exit;
}
/* Write the data here. */
fwrite ($file, "1111111111111111" . "\n");
fclose ($file);

?>