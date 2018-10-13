<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="public/fonts/AvenirNextLTPro-Medium.ttf" rel="application/x-font-ttf">
    <link href="public/styles/style.css" type="text/css" rel="stylesheet">
    <script src="public/scripts/jquery.min.js"></script>
</head>
<body>

<div class="topnav" id="myTopnav">
    <a href="/" class="active">
        <img src="public/images/logo.png"/>
    </a>
    <a href="/" class="active">
        <img src="public/images/logo_left.png">
    </a>
    <a id="searchbar">
        <div class="bar">
            <input type="text" placeholder="Enter your search terms"/>
        </div>
    </a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<div class="row">
    <div class="column-68"></div>
    <div class="column-8">
        <div class="demo-btns">
            <div class="info">
                <div class="buttons">
                    <p>
                        <a href="" data-modal="#modal1" class="modal__trigger" onclick="loadIframe();">
                            <img src="public/images/ic_file_upload_black_48px.svg"/>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div id="modal1" class="modal modal--align-top modal__bg" role="dialog" aria-hidden="true">
            <div class="modal__dialog">
                <div class="modal__content" style="width: 400px;height: 500px">
                    <br>
                    <h2 class="light-blue"><strong>Data Upload (*.CSV)</strong></h2>
                    <iframe scrolling="no" frameborder="0" style="width: 100%;height: 100%" id="upload-iframe"></iframe>
                    <a href="" class="modal__close demo-close">
                        <svg class="" viewBox="0 0 24 24">
                            <path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z">
                                <path d="M0 0h24v24h-24z" fill="none">
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="column-8">
        <div class="demo-btns">
            <div class="info">
                <div class="buttons">
                    <p>
                        <a href="" data-modal="#modal2" class="modal__trigger">
                            <img src="public/images/ic_settings_black_48px.svg"/>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div id="modal2" class="modal modal--align-top modal__bg" role="dialog" aria-hidden="true">
            <div class="modal__dialog">
                <div class="modal__content" style="width: 400px">
                    <br>
                    <h2 class="light-blue"><strong>Settings</strong></h2>
                    <form method="get" action="save_settings.php">
                        <div class="row">
                            <div class="column-30">
                                <label for="place">Place</label>
                            </div>
                            <div class="column-70">
                                <input name="place" type="text" id="place" class="settings-input"
                                       onchange="change_settings($(this).val(), $(this).attr('name'));"
                                       onkeyup="this.onchange();">
                            </div>
                        </div>
                        <div class="row">
                            <div class="column-30">
                                <label for="padding">Padding</label>
                            </div>
                            <div class="column-70">
                                <input name="padding" type="text" id="padding" class="settings-input"
                                       onchange="change_settings($(this).val(), $(this).attr('name'));"
                                       onkeyup="this.onchange();">
                            </div>
                        </div>
                        <div class="row">
                            <div class="column-30">
                                <label for="distributiondate">Date of Distribution (dd-mm-yyyy)</label>
                            </div>
                            <div class="column-70">
                                <input name="distributiondate" type="text" id="distributiondate" class="settings-input"
                                       onchange="change_settings($(this).val(), $(this).attr('name'));"
                                       onkeyup="this.onchange();">
                            </div>
                        </div>

                        <div class="row">
                            <p class="light-blue">Persons details for signature on degrees</p>
                        </div>
                        <div class="row">
                            <div class="column-30">
                                <label for="person1Name">Person1 Name</label>
                            </div>
                            <div class="column-70">
                                <input name="person1Name" type="text" id="person1Name" class="settings-input"
                                       onchange="change_settings($(this).val(), $(this).attr('name'));"
                                       onkeyup="this.onchange();">
                            </div>
                        </div>
                        <div class="row">
                            <div class="column-30">
                                <label for="person1JobRole">Person1 Job Role</label>
                            </div>
                            <div class="column-70">
                                <input name="person1JobRole" type="text" id="person1JobRole" class="settings-input"
                                       onchange="change_settings($(this).val(), $(this).attr('name'));"
                                       onkeyup="this.onchange();">
                            </div>
                        </div>
                        <div class="row">
                            <div class="column-30">
                                <label for="person1JobPlace">Person1 Job Place</label>
                            </div>
                            <div class="column-70">
                                <input name="person1JobPlace" type="text" id="person1JobPlace"
                                       class="settings-input"
                                       onchange="change_settings($(this).val(), $(this).attr('name'));"
                                       onkeyup="this.onchange();">
                            </div>
                        </div>
                        <div class="row">
                            <div class="column-30">
                                <label for="person2Name">Person2 Name</label>
                            </div>
                            <div class="column-70">
                                <input name="person2Name" type="text" id="person2Name" class="settings-input"
                                       onchange="change_settings($(this).val(), $(this).attr('name'));"
                                       onkeyup="this.onchange();">
                            </div>
                        </div>
                        <div class="row">
                            <div class="column-30">
                                <label for="person2JobRole">Person2 Job Role</label>
                            </div>
                            <div class="column-70">
                                <input name="person2JobRole" type="text" id="person2JobRole" class="settings-input"
                                       onchange="change_settings($(this).val(), $(this).attr('name'));"
                                       onkeyup="this.onchange();">
                            </div>
                        </div>
                        <div class="row">
                            <div class="column-30">
                                <label for="person2JobPlace">Person2 Job Place</label>
                            </div>
                            <div class="column-70">
                                <input name="person2JobPlace" type="text" id="person2JobPlace"
                                       class="settings-input"
                                       onchange="change_settings($(this).val(), $(this).attr('name'));"
                                       onkeyup="this.onchange();">
                            </div>
                        </div>
                        <div class="row">
                            <p class="light-blue">Sequences of Degrees</p>
                        </div>
                        <div class="row">
                            <div class="column-30">
                                <label for="degree1">Degree1</label>
                            </div>
                            <div class="column-70">
                                <select name="degree1" id="degree1" class="settings-input"
                                        onchange="change_settings($(this).val(), $(this).attr('name'));"
                                        onkeyup="this.onchange();">
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column-30">
                                <label for="degree2">Degree2</label>
                            </div>
                            <div class="column-70">
                                <select name="degree2" id="degree2" class="settings-input"
                                        onchange="change_settings($(this).val(), $(this).attr('name'));"
                                        onkeyup="this.onchange();">
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column-30">
                                <label for="degree3">Degree3</label>
                            </div>
                            <div class="column-70">
                                <select name="degree3" id="degree3" class="settings-input"
                                        onchange="change_settings($(this).val(), $(this).attr('name'));"
                                        onkeyup="this.onchange();">
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column-30">
                                <label for="degree4">Degree4</label>
                            </div>
                            <div class="column-70">
                                <select name="degree4" id="degree4" class="settings-input"
                                        onchange="change_settings($(this).val(), $(this).attr('name'));"
                                        onkeyup="this.onchange();">
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column-30">
                                <label for="degree5">Degree5</label>
                            </div>
                            <div class="column-70">
                                <select name="degree5" id="degree5" class="settings-input"
                                        onchange="change_settings($(this).val(), $(this).attr('name'));"
                                        onkeyup="this.onchange();">
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column-30">
                                <label for="degree6">Degree6</label>
                            </div>
                            <div class="column-70">
                                <select name="degree6" id="degree6" class="settings-input"
                                        onchange="change_settings($(this).val(), $(this).attr('name'));"
                                        onkeyup="this.onchange();">
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column-30">
                                <label for="degree7">Degree7</label>
                            </div>
                            <div class="column-70">
                                <select name="degree7" id="degree7" class="settings-input"
                                        onchange="change_settings($(this).val(), $(this).attr('name'));"
                                        onkeyup="this.onchange();">
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column-30">
                                <label for="degree8">Degree8</label>
                            </div>
                            <div class="column-70">
                                <select name="degree8" id="degree8" class="settings-input"
                                        onchange="change_settings($(this).val(), $(this).attr('name'));"
                                        onkeyup="this.onchange();">
                                </select>
                            </div>
                        </div>
                    </form>
                    <a href="" class="modal__close demo-close">
                        <svg class="" viewBox="0 0 24 24">
                            <path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z">
                                <path d="M0 0h24v24h-24z" fill="none">
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="column-8">
        <div class="demo-btns">
            <div class="info">
                <div class="buttons">
                    <p>
                        <a href="" data-modal="#modal3" class="modal__trigger">
                            <img src="public/images/ic_delete_black_48px.svg"/>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div id="modal3" class="modal modal--align-top modal__bg" role="dialog" aria-hidden="true">
            <div class="modal__dialog">
                <div class="modal__content" style="width: 400px">
                    <br>
                    <h2 class="light-blue"><strong>Delete Data</strong></h2>
                    <div class="row">
                        <div class="row">
                            <div class="center">
                                <p class="button-danger-long center" onclick="resettotaldegrees();">Reset Total Degrees</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="center">
                                <p class="button-danger-long center" onclick="deletealldegrees();">Delete all Degrees</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="center">
                                <p class="button-danger-long center" onclick="deleteallqr();">Delete all Qr Codes</p>
                            </div>
                        </div>
                    </div>
                    <a href="" class="modal__close demo-close">
                        <svg class="" viewBox="0 0 24 24">
                            <path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z">
                                <path d="M0 0h24v24h-24z" fill="none">
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="column-8">
        <div class="demo-btns">
            <div class="info">
                <div class="buttons">
                    <p>
                        <a href="" data-modal="#modal4" class="modal__trigger">
                            <img src="public/images/ic_enhanced_encryption_black_48px.svg"/>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div id="modal4" class="modal modal--align-top modal__bg" role="dialog" aria-hidden="true">
            <div class="modal__dialog">
                <div class="modal__content" style="width: 400px">
                    <br>
                    <h2 class="light-blue"><strong>AES-128-ECB Encryption</strong></h2>
                    <div class="row">
                        <form>
                            <div class="row">
                                <div class="column-30">
                                    <label for="encrypt">Encrypt Text</label>
                                </div>
                                <div class="column-70">
                                    <input name="encrypt" type="text" id="encrypt" class="settings-input"
                                           onchange="encrypt_string($(this).val(), $(this).attr('name'));"
                                           onkeyup="this.onchange();">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <input id="encryptedtext" class="settings-input" />
                    </div>
                    <br />
                    <div class="row">
                        <form>
                            <div class="row">
                                <div class="column-30">
                                    <label for="decrypt">Decrypt Text</label>
                                </div>
                                <div class="column-70">
                                    <input name="decrypt" type="text" id="decrypt" class="settings-input"
                                           onchange="decrypt_string($(this).val(), $(this).attr('name'));"
                                           onkeyup="this.onchange();">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <input id="decryptedtext" class="settings-input" />
                    </div>
                    <a href="" class="modal__close demo-close">
                        <svg class="" viewBox="0 0 24 24">
                            <path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z">
                                <path d="M0 0h24v24h-24z" fill="none">
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="center-filters">
    <div id="roll-no-row" class="row">
        <div class="column-50">
            <label for="roll_no" class="light-blue">Roll No:</label>
        </div>
        <div class="column-50 dropdown">
            <input type="text" id="roll_no" name="roll_no" placeholder="Enter Roll No" class="filter-input roll-no"
                   onkeyup="search_roll_no()" autocomplete="off"/>
            <div id="roll-no-list" class="dropdown-content"></div>
        </div>
    </div>
    <div id="name-row" class="row">
        <div class="column-50">
            <label for="name" class="light-blue">Name:</label>
        </div>
        <div class="column-50 dropdown">
            <input type="text" id="name" name="name" placeholder="Enter Student Name" class="filter-input name"
                   onkeyup="search_name()" autocomplete="off"/>
            <div id="name-list" class="dropdown-content"></div>
        </div>
    </div>
    <div id="degree-row" class="row hide">
        <div class="column-50">
            <label for="degree" class="light-blue">Degree:</label>
        </div>
        <div class="column-50">
            <select id="degree" name="degree" class="filter-input">
                <option value="none" selected>None</option>
            </select>
        </div>
    </div>
    <div id="start-year-row" class="row hide">
        <div class="column-50">
            <label for="start_year" class="light-blue">Start Year:</label>
        </div>
        <div class="column-50">
            <select id="start_year" name="start_year" class="filter-input">
                <option value="none" selected>None</option>
                <?php
                for ($x = 1980; $x <= 2050; $x++) {
                    echo "<option value=\"$x\">$x</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div id="end-year-row" class="row hide">
        <div class="column-50">
            <label for="end_year" class="light-blue">End Year:</label>
        </div>
        <div class="column-50">
            <select id="end_year" name="end_year" class="filter-input">
                <option value="none" selected>None</option>
                <?php
                for ($x = 1980; $x <= 2050; $x++) {
                    echo "<option value=\"$x\">$x</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="column-20">
            <p class="center light-blue options deactivated">More Options</p>
        </div>
        <div class="column-80">
            <p class="center button" onclick="get_list();">Get List</p>
        </div>
    </div>
</div>
<div class="row pad-20">
    <div class="column-100">
        <h2 class="message green"><span id="message-numbers" class="strong">0</span> rows selected</h2>
        <div style="overflow-x:auto;">
            <table>
                <thead>
                <tr style="border-bottom:2px solid #5c9bb7">
                    <th class="strong"><input name="select-all" value="select-all" type="checkbox" title="Select All"
                                              class="select-all"/></th>
                    <th class="strong">Roll No</th>
                    <th class="strong">Name</th>
                    <th class="strong">Degree</th>
                    <th class="strong">Start Year</th>
                    <th class="strong">End Year</th>
                </tr>
                </thead>
                <tbody class="student-list-table"></tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="column-35"></div>
    <div class="column-10">
        <p class="center button" onclick="generate();">Generate</p>
    </div>
    <div class="column-10">
        <a class="center" style="text-decoration: none" href="download_degrees.php"><p class="button">Download</p> </a>
    </div>
    <div class="column-10">
        <a class="center" style="text-decoration: none" href="download_qrcodes.php"><p class="button">Qr Codes</p> </a>
    </div>
    <div class="column-35"></div>
</div>
<script type="text/javascript" src="public/scripts/script.js"></script>
</body>
</html>
