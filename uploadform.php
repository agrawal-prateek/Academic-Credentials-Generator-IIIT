<html>
<head>
    <link type="text/css" rel="stylesheet" href="public/styles/style.css">
</head>
<body>
<form method="post" action="upload.php" enctype="multipart/form-data">
    <div class="row">
        <div class="column-50">
            <label for="upload-button" class="light-blue">File</label>
        </div>
        <div class="column-50">
            <input type="file" name="file" id="upload-button" required/>
        </div>
    </div>
    <div class="row">
        <div class="column-50">
            <label for="upload-degree" class="light-blue">Degree</label>
        </div>
        <div class="column-50">
            <select id="upload-degree" name="degree" required>
                <option value="phd">Ph.D</option>
                <option value="mba">MBA</option>
                <option value="ipgmba">IPG-MBA</option>
                <option value="mtech(an)">M.Tech(AN)</option>
                <option value="mtech(is)">M.Tech(IS)</option>
                <option value="mtech(dc)">M.Tech(DC)</option>
                <option value="mtech(vlsi)">M.Tech(VLSI)</option>
                <option value="ipgmtech">IPG-M.Tech</option>
            </select>
        </div>
    </div>
    <div class="row hide" id="start-year-row">
        <div class="column-50">
            <label for="upload-start-year" class="light-blue">Start Year</label>
        </div>
        <div class="column-50">
            <input class="settings-input" type="number" minlength="4" name="startyear" id="upload-start-year"/>
        </div>
    </div>
    <div class="row hide" id="end-year-row">
        <div class="column-50">
            <label for="upload-end-year" class="light-blue">End Year</label>
        </div>
        <div class="column-50">
            <input class="settings-input" type="number" minlength="4" name="endyear" id="upload-end-year"/>
        </div>
    </div>
    <br>
    <br>

    <div class="row">
        <div class="center">
            <input class="button center" type="submit" value="Upload">
        </div>
    </div>
</form>

<br>
<br>
<br>

<div class="row">
    <div class="center">
        <p class="button-danger center" onclick="deletedata();">Delete All Data</p>
    </div>
</div>
<script type="text/javascript" src="public/scripts/jquery.min.js"></script>
<script type="text/javascript" src="public/scripts/script.js"></script>
</body>
</html>
