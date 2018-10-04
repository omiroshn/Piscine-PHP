echo "1:"
./magnifying_glass.php page.html > temp
diff temp newPage.html
echo "2:"
./magnifying_glass.php page2.html > temp
diff temp newPage2.html