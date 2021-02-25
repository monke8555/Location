<html>

<head>
    <title>Your Location</title>

    <body>
        <div>
            <iframe width="500" id="iframe" height="400" frameborder="0" scrolling="no"></iframe>
            <div style="white-space: nowrap; text-align: center; width: 500px; padding: 6px 0;">
                <a id="largeMapLink" target="_blank" href="https://www.bing.com/maps?cp=24.798920389107664~46.67100619111901&amp;sty=r&amp;lvl=15&amp;FORM=MBEDLD">View Larger Map</a> &nbsp; | &nbsp;
                <a id="dirMapLink" target="_blank" href="https://www.bing.com/maps/directions?cp=24.798920389107664~46.67100619111901&amp;sty=r&amp;lvl=11&amp;rtp=~pos.24.798920389107664_46.67100619111901____&amp;FORM=MBEDLD">Get Directions</a>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            function createTable(tableData) {
                var table = document.createElement('table');
                var tableBody = document.createElement('tbody');

                tableData.forEach(function(rowData) {
                    var row = document.createElement('tr');

                    rowData.forEach(function(cellData) {
                        var cell = document.createElement('td');
                        cell.appendChild(document.createTextNode(cellData));
                        row.appendChild(cell);
                    });

                    tableBody.appendChild(row);
                });

                table.appendChild(tableBody);
                document.body.appendChild(table);
            }
            var city = "";
            var continent = "";
            var countryCode = "";
            var country = "";
            var ip = "<?php echo $_SERVER['REMOTE_ADDR'] ?>";
            var latitude = 0;
            var longitude = 0;
            var callCode = "+";
            var capital = "";
            var flagURL = "";
            var emoji = "";
            var geoname = 0;
            var languageCode = "";
            var languageName = "";
            var languageNative = "";
            var region = "";
            var ipType = "";
            var ZIP = "";
            var array = [
                ["City", city],
                ["Continent", continent],
                ["Country Code", countryCode],
                ["Country", country],
                ["Latitude", latitude],
                ["Longitude", longitude],
                ["Calling Code", callCode],
                ["Capital", capital],
                ["Flag", "<img src=\"" + flagURL + "\">"],
                ["Emoji", emoji],
                ["<a href=\"geonames.org\">Geoname</a>", geoname],
                ["Language Code", languageCode],
                ["Language Name", languageName],
                ["Native Language Name", languageNative],
                ["Region", region],
                ["IP Address Type", ipType],
                ["IP Address", ip],
                ["ZIP Code", ZIP]
            ];
            var a = "";
            var table = "";
            $.getJSON("http://api.ipstack.com/" + ip + "?access_key=2da205a6f91ca96d14d6a5992cba5afc&format=1").then(function(data) {
                city = data.city;
                continent = data.continent_name;
                countryCode = data.country_code;
                country = data.country_name;
                latitude = data.latitude;
                longitude = data.longitude;
                callCode += data.location.calling_code;
                capital = data.location.capital;
                flagURL = data.location.country_flag;
                emoji = data.location.country_flag_emoji;
                geoname = data.location.geoname_id;
                languageCode = data.location.languages[0].code;
                languageName = data.location.languages[0].name;
                languageNative = data.location.languages[0].native;
                region = data.region_name;
                ipType = data.type;
                ZIP = data.zip
                var iframe = document.getElementById("iframe");
                iframe.src = "https://www.bing.com/maps/embed?h=400&w=500&cp=" + latitude + "~" + longitude + "&lvl=15&typ=d&sty=r&src=SHELL&FORM=MBEDV8";
                array = [
                    ["City", city],
                    ["Continent", continent],
                    ["Country Code", countryCode],
                    ["Country", country],
                    ["Latitude", latitude],
                    ["Longitude", longitude],
                    ["Calling Code", callCode],
                    ["Capital", capital],
                    ["Flag", ""],
                    ["Emoji", emoji],
                    ["", geoname],
                    ["Language Code", languageCode],
                    ["Language Name", languageName],
                    ["Native Language Name", languageNative],
                    ["Region", region],
                    ["IP Address Type", ipType],
                    ["IP Address", ip],
                    ["ZIP Code", ZIP]
                ];
                table = createTable(array);
                document.getElementsByTagName("td")[17].innerHTML = "<img width=\"75\" height=\"50\" src=\"" + flagURL + "\">";
                document.getElementsByTagName("td")[20].innerHTML = "<a href=\"https://www.geonames.org/\">Geoname</a>";
            });
        </script>
    </body>
</html>
