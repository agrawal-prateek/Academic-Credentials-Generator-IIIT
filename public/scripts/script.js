
/******************************************************
Please add new scripts to at the end of this file.
 Don't change the sequence of scripts.
 *****************************************************/

//It must be first function
$.getJSON('get_data.php', function (data) {
    student_data=data;
    for(i=0;i<data["courses"].length;i++){
        $('#degree').append('<option value="'+data["courses"][i]+'">'+data["courses"][i]+'</option>');
        $('#degree1').append('<option value="'+data["courses"][i]+'">'+data["courses"][i]+'</option>');
        $('#degree2').append('<option value="'+data["courses"][i]+'">'+data["courses"][i]+'</option>');
        $('#degree3').append('<option value="'+data["courses"][i]+'">'+data["courses"][i]+'</option>');
        $('#degree4').append('<option value="'+data["courses"][i]+'">'+data["courses"][i]+'</option>');
        $('#degree5').append('<option value="'+data["courses"][i]+'">'+data["courses"][i]+'</option>');
        $('#degree6').append('<option value="'+data["courses"][i]+'">'+data["courses"][i]+'</option>');
        $('#degree7').append('<option value="'+data["courses"][i]+'">'+data["courses"][i]+'</option>');
        $('#degree8').append('<option value="'+data["courses"][i]+'">'+data["courses"][i]+'</option>');
    }
    for(i=0;i<data["student_data"].length;i++){
        $('#roll-no-list').append('<a class="roll-no-list-a" onclick="change_roll_no(\''+data["student_data"][i][0]+'\');">'+data["student_data"][i][0]+'</a>');
    }
    for(i=0;i<data["student_data"].length;i++){
        $('#name-list').append('<a class="name-list-a" onclick="change_name(\''+data["student_data"][i][1]+'\');">'+data["student_data"][i][1]+'</a>');
    }
});


$("#upload-degree").change(function () {
    var inputValue = $(this).val();
    if(inputValue === 'phd' ){
        $('#start-year-row').addClass('hide');
        $('#upload-start-year').removeAttr('required');
        $('#end-year-row').addClass('hide');
        $('#upload-end-year').removeAttr('required');
    }
    else {
        $('#start-year-row').removeClass('hide');
        $('#upload-start-year').attr("required", true);
        $('#end-year-row').removeClass('hide');
        $('#upload-end-year').attr("required", true);
    }
});
function deletedata() {
    if (confirm("Do you really want to delete all previous data from server!")) {
        var request = $.ajax({
            url: "delete_data.php",
            type: "post"
        });
        request.done(function (response, textStatus, jqXHR){
            alert("Data Deleted");
        });
        request.fail(function (jqXHR, textStatus, errorThrown) {
            alert(
                "The following error occurred: " +
                textStatus+"Error:"+ errorThrown
            );
        });
    }
}
function loadIframe() {
    var iframe = document.getElementById('upload-iframe');
    iframe.src = 'uploadform.php';
}
function change_settings(value, name) {
    var request = $.ajax({
        url: "save_settings.php",
        type: "post",
        data: {value:value, name:name}
    });

    request.done(function (response, textStatus, jqXHR){
        console.log("Settings saved!");
    });

    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
}
function encrypt_string(value, name) {
    var request = $.ajax({
        url: "safeCrypto.php",
        type: "post",
        data: {stringtoencrypt:value, name:name}
    });

    request.done(function (response, textStatus, jqXHR){
        $('#encryptedtext').val(response);
    });

    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
}
function decrypt_string(value, name) {
    var request = $.ajax({
        url: "safeCrypto.php",
        type: "post",
        data: {stringtodecrypt:value, name:name}
    });

    request.done(function (response, textStatus, jqXHR){
        $('#decryptedtext').val(response);
    });

    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
}
$.ajax({
    url: 'settings.json',
    dataType: 'json',
    success: function(data) {
        $.each(data, function(key, val) {
            if(key === "place"){
                $('#place').val(val);
            }
            else if(key === "person1Name"){
                $('#person1Name').val(val);
            }
            else if(key === "person1JobRole"){
                $('#person1JobRole').val(val);
            }
            else if(key === "person1JobPlace"){
                $('#person1JobPlace').val(val);
            }
            else if(key === "person2Name"){
                $('#person2Name').val(val);
            }
            else if(key === "person2JobRole"){
                $('#person2JobRole').val(val);
            }
            else if(key === "person2JobPlace"){
                $('#person2JobPlace').val(val);
            }
            else if(key === "padding"){
                $('#padding').val(val);
            }
            else if(key === "distributiondate"){
                $('#distributiondate').val(val);
            }
            else if(key === "degree1"){
                $('#degree1').val(val);
            }
            else if(key === "degree2"){
                $('#degree2').val(val);
            }
            else if(key === "degree3"){
                $('#degree3').val(val);
            }
            else if(key === "degree4"){
                $('#degree4').val(val);
            }
            else if(key === "degree5"){
                $('#degree5').val(val);
            }

            else if(key === "degree6"){
                $('#degree6').val(val);
            }

            else if(key === "degree7"){
                $('#degree7').val(val);
            }

            else if(key === "degree8"){
                $('#degree8').val(val);
            }

        });
    },
    statusCode: {
        404: function() {
            alert('There was a problem with the server.  Try again soon!');
        }
    }
});
// TopNav Script
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

//Modal Script

var Modal = (function() {

    var trigger = $qsa('.modal__trigger');
    var modals = $qsa('.modal');
    var modalsbg = $qsa('.modal__bg');
    var content = $qsa('.modal__content');
    var closers = $qsa('.modal__close');
    var w = window;
    var isOpen = false;
    var contentDelay = 400;
    var len = trigger.length;
    function $qsa(el) {
        return document.querySelectorAll(el);
    }
    var getId = function(event) {
        event.preventDefault();
        var self = this;
        var modalId = self.dataset.modal;
        var len = modalId.length;
        var modalIdTrimmed = modalId.substring(1, len);
        var modal = document.getElementById(modalIdTrimmed);
        makeDiv(self, modal);
    };
    var makeDiv = function(self, modal) {
        var fakediv = document.getElementById('modal__temp');
        if (fakediv === null) {
            var div = document.createElement('div');
            div.id = 'modal__temp';
            self.appendChild(div);
            moveTrig(self, modal, div);
        }
    };
    var moveTrig = function(trig, modal, div) {
        var trigProps = trig.getBoundingClientRect();
        var m = modal;
        var mProps = m.querySelector('.modal__content').getBoundingClientRect();
        var transX, transY, scaleX, scaleY;
        var xc = w.innerWidth / 2;
        var yc = w.innerHeight / 2;
        trig.classList.add('modal__trigger--active');
        scaleX = mProps.width / trigProps.width;
        scaleY = mProps.height / trigProps.height;
        scaleX = scaleX.toFixed(3);
        scaleY = scaleY.toFixed(3);
        transX = Math.round(xc - trigProps.left - trigProps.width / 2);
        transY = Math.round(yc - trigProps.top - trigProps.height / 2);
        if (m.classList.contains('modal--align-top')) {
            transY = Math.round(mProps.height / 2 + mProps.top - trigProps.top - trigProps.height / 2);
        }


        // translate button to center of screen
        trig.style.transform = 'translate(' + transX + 'px, ' + transY + 'px)';
        trig.style.webkitTransform = 'translate(' + transX + 'px, ' + transY + 'px)';
        div.style.transform = 'scale(' + scaleX + ',' + scaleY + ')';
        div.style.webkitTransform = 'scale(' + scaleX + ',' + scaleY + ')';
        window.setTimeout(function() {
            window.requestAnimationFrame(function() {
                open(m, div);
            });
        }, contentDelay);
    };
    var open = function(m, div) {
        if (!isOpen) {
            var content = m.querySelector('.modal__content');
            m.classList.add('modal--active');
            content.classList.add('modal__content--active');
            content.addEventListener('transitionend', hideDiv, false);
            isOpen = true;
        }

        function hideDiv() {
            div.style.opacity = '0';
            content.removeEventListener('transitionend', hideDiv, false);
        }
    };
    var close = function(event) {
        event.preventDefault();
        event.stopImmediatePropagation();
        var target = event.target;
        var div = document.getElementById('modal__temp');
        if (isOpen && target.classList.contains('modal__bg') || target.classList.contains('modal__close')) {
            div.style.opacity = '1';
            div.removeAttribute('style');
            for (var i = 0; i < len; i++) {
                modals[i].classList.remove('modal--active');
                content[i].classList.remove('modal__content--active');
                trigger[i].style.transform = 'none';
                trigger[i].style.webkitTransform = 'none';
                trigger[i].classList.remove('modal__trigger--active');
            }
            div.addEventListener('transitionend', removeDiv, false);
            isOpen = false;
        }

        function removeDiv() {
            setTimeout(function() {
                window.requestAnimationFrame(function() {
                    div.remove();
                });
            }, contentDelay - 50);
        }

    };

    var bindActions = function() {
        for (var i = 0; i < len; i++) {
            trigger[i].addEventListener('click', getId, false);
            closers[i].addEventListener('click', close, false);
            modalsbg[i].addEventListener('click', close, false);
        }
    };
    var init = function() {
        bindActions();
    };
    return {
        init: init
    };

}());

Modal.init();

function change_roll_no(rollNo) {
    $('#roll_no').val(rollNo);
    $('#roll-no-list').hide();
}
function change_name(name) {
    $('#name').val(name);
    $('#name-list').hide();
}
// Load and Add data to filters
var student_data=null;
var i;
$("#roll_no").click(function () {
    $('#roll-no-list').show();
});
$("#name").click(function () {
    $('#name-list').show();
});
$(document).click(function(e) {
    if (!$(e.target).hasClass("roll-no") && !$(e.target).hasClass("name") && $(e.target).parents(".dropdown-content").length === 0) {
        $('.dropdown-content').hide();
    }
});

// Search Functions
function search_roll_no() {
    var input=document.getElementById('roll_no');
    var filter = input.value.toUpperCase();
    var div = document.getElementById("roll-no-list");
    for (var i = 0; i <= student_data["student_data"].length; i++) {
        var a = div.getElementsByTagName("a")[i];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            a.style.display = "";
        } else {
            a.style.display = "none";
        }
    }
}
function search_name() {
    var input=document.getElementById('name');
    var filter = input.value.toUpperCase();
    var div = document.getElementById("name-list");
    for (var i = 0; i <= student_data["student_data"].length; i++) {
        var a = div.getElementsByTagName("a")[i];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            a.style.display = "";
        } else {
            a.style.display = "none";
        }
    }
}

// Show Options
$('.options').click(function () {
   if(this.classList.contains('deactivated')){
       this.classList.remove('deactivated');
       this.classList.add('activated');
       $('#roll-no-row').addClass('hide');
       $('#name-row').addClass('hide');
       $('#degree-row').removeClass('hide');
       $('#start-year-row').removeClass('hide');
       $('#end-year-row').removeClass('hide');
       this.innerHTML="Less Options";
   }
   else {
       this.classList.remove('activated');
       this.classList.add('deactivated');
       $('#roll-no-row').removeClass('hide');
       $('#name-row').removeClass('hide');
       $('#degree-row').addClass('hide');
       $('#start-year-row').addClass('hide');
       $('#end-year-row').addClass('hide');
       this.innerHTML="More Options";
   }
});
// Get List in Table
function get_list() {
    var table = $('.student-list-table');
    var roll_no = $('#roll_no').val();
    var name = $("#name").val();
    var degree = $("#degree").val();
    var start_year = $("#start_year").val();
    var end_year = $("#end_year").val();
    table.empty();

    if($('.options').hasClass('deactivated')){
        if(roll_no){
            for(i=0;i<student_data["student_data"].length;i++){
                if(student_data["student_data"][i][0] === roll_no){
                    table.append(
                        "<tr><td><input id=\""+student_data["student_data"][i][0]+"\" class=\"filter-checkbox\" onclick=\"click_on_checkbox('"+student_data["student_data"][i][0]+"');\" type=\"checkbox\" value='"+student_data["student_data"][i][0]+"'></td><td>"+student_data["student_data"][i][0]+"</td><td>"+student_data["student_data"][i][1]+"</td><td>"+student_data["student_data"][i][2]+"</td><td>"+student_data["student_data"][i][3]+"</td><td>"+student_data["student_data"][i][4]+"</td></tr>"
                    );
                    break;
                }
            }
        }
        else if(name){
            for(i=0;i<student_data["student_data"].length;i++){
                if(student_data["student_data"][i][1] === name){
                    table.append(
                        "<tr><td><input id=\""+student_data["student_data"][i][0]+"\" class=\"filter-checkbox\" onclick=\"click_on_checkbox('"+student_data["student_data"][i][0]+"');\" type=\"checkbox\" value='"+student_data["student_data"][i][0]+"'></td><td>"+student_data["student_data"][i][0]+"</td><td>"+student_data["student_data"][i][1]+"</td><td>"+student_data["student_data"][i][2]+"</td><td>"+student_data["student_data"][i][3]+"</td><td>"+student_data["student_data"][i][4]+"</td></tr>"
                    );
                    break;
                }
            }
        }
        else {
            for(i=0;i<student_data["student_data"].length;i++){
                    table.append(
                        "<tr><td><input id=\""+student_data["student_data"][i][0]+"\" class=\"filter-checkbox\" onclick=\"click_on_checkbox('"+student_data["student_data"][i][0]+"');\" type=\"checkbox\" value='"+student_data["student_data"][i][0]+"'></td><td>"+student_data["student_data"][i][0]+"</td><td>"+student_data["student_data"][i][1]+"</td><td>"+student_data["student_data"][i][2]+"</td><td>"+student_data["student_data"][i][3]+"</td><td>"+student_data["student_data"][i][4]+"</td></tr>"
                    );
            }
        }
    }
    else {
        if(degree !== 'none' && start_year==='none' && end_year==='none'){

            for(i=0;i<student_data["student_data"].length;i++){
                if(student_data["student_data"][i][2] === degree){
                    table.append(
                        "<tr><td><input id=\""+student_data["student_data"][i][0]+"\" class=\"filter-checkbox\" onclick=\"click_on_checkbox('"+student_data["student_data"][i][0]+"');\" type=\"checkbox\" value='"+student_data["student_data"][i][0]+"'></td><td>"+student_data["student_data"][i][0]+"</td><td>"+student_data["student_data"][i][1]+"</td><td>"+student_data["student_data"][i][2]+"</td><td>"+student_data["student_data"][i][3]+"</td><td>"+student_data["student_data"][i][4]+"</td></tr>"
                    );
                }
            }
        }
        else if(degree==='none' && start_year !== 'none' && end_year==='none'){

            for(i=0;i<student_data["student_data"].length;i++){
                if(student_data["student_data"][i][3] === start_year){
                    table.append(
                        "<tr><td><input id=\""+student_data["student_data"][i][0]+"\" class=\"filter-checkbox\" onclick=\"click_on_checkbox('"+student_data["student_data"][i][0]+"');\" type=\"checkbox\" value='"+student_data["student_data"][i][0]+"'></td><td>"+student_data["student_data"][i][0]+"</td><td>"+student_data["student_data"][i][1]+"</td><td>"+student_data["student_data"][i][2]+"</td><td>"+student_data["student_data"][i][3]+"</td><td>"+student_data["student_data"][i][4]+"</td></tr>"
                    );
                }
            }
        }
        else if(degree==='none' && start_year==='none' && end_year !== 'none'){

            for(i=0;i<student_data["student_data"].length;i++){
                if(student_data["student_data"][i][4] === end_year){
                    table.append(
                        "<tr><td><input id=\""+student_data["student_data"][i][0]+"\" class=\"filter-checkbox\" onclick=\"click_on_checkbox('"+student_data["student_data"][i][0]+"');\" type=\"checkbox\" value='"+student_data["student_data"][i][0]+"'></td><td>"+student_data["student_data"][i][0]+"</td><td>"+student_data["student_data"][i][1]+"</td><td>"+student_data["student_data"][i][2]+"</td><td>"+student_data["student_data"][i][3]+"</td><td>"+student_data["student_data"][i][4]+"</td></tr>"
                    );
                }
            }
        }
        else if(degree !== 'none' && start_year !== 'none' && end_year==='none'){

            for(i=0;i<student_data["student_data"].length;i++){
                if(student_data["student_data"][i][2] === degree && student_data["student_data"][i][3] === start_year){
                    table.append(
                        "<tr><td><input id=\""+student_data["student_data"][i][0]+"\" class=\"filter-checkbox\" onclick=\"click_on_checkbox('"+student_data["student_data"][i][0]+"');\" type=\"checkbox\" value='"+student_data["student_data"][i][0]+"'></td><td>"+student_data["student_data"][i][0]+"</td><td>"+student_data["student_data"][i][1]+"</td><td>"+student_data["student_data"][i][2]+"</td><td>"+student_data["student_data"][i][3]+"</td><td>"+student_data["student_data"][i][4]+"</td></tr>"
                    );
                }
            }
        }
        else if(degree==='none' && start_year !== 'none' && end_year !== 'none'){

            for(i=0;i<student_data["student_data"].length;i++){
                if(student_data["student_data"][i][3] === start_year && student_data["student_data"][i][4] === end_year){
                    table.append(
                        "<tr><td><input id=\""+student_data["student_data"][i][0]+"\" id=\""+student_data["student_data"][i][0]+"\" class=\"filter-checkbox\" onclick=\"click_on_checkbox('"+student_data["student_data"][i][0]+"');\" type=\"checkbox\" value='"+student_data["student_data"][i][0]+"'></td><td>"+student_data["student_data"][i][0]+"</td><td>"+student_data["student_data"][i][1]+"</td><td>"+student_data["student_data"][i][2]+"</td><td>"+student_data["student_data"][i][3]+"</td><td>"+student_data["student_data"][i][4]+"</td></tr>"
                    );
                }
            }
        }
        else if(degree !== 'none' && start_year==='none' && end_year !== 'none'){

            for(i=0;i<student_data["student_data"].length;i++){
                if(student_data["student_data"][i][2] === degree && student_data["student_data"][i][4] === end_year){
                    table.append(
                        "<tr><td><input id=\""+student_data["student_data"][i][0]+"\" class=\"filter-checkbox\" onclick=\"click_on_checkbox('"+student_data["student_data"][i][0]+"');\" type=\"checkbox\" value='"+student_data["student_data"][i][0]+"'></td><td>"+student_data["student_data"][i][0]+"</td><td>"+student_data["student_data"][i][1]+"</td><td>"+student_data["student_data"][i][2]+"</td><td>"+student_data["student_data"][i][3]+"</td><td>"+student_data["student_data"][i][4]+"</td></tr>"
                    );
                }
            }
        }
        else if(degree !== 'none' && start_year !== 'none' && end_year !== 'none'){

            for(i=0;i<student_data["student_data"].length;i++){
                if(student_data["student_data"][i][2] === degree && student_data["student_data"][i][3] === start_year && student_data["student_data"][i][4] === end_year){
                    table.append(
                        "<tr><td><input id=\""+student_data["student_data"][i][0]+"\" class=\"filter-checkbox\" onclick=\"click_on_checkbox('"+student_data["student_data"][i][0]+"');\" type=\"checkbox\" value='"+student_data["student_data"][i][0]+"'></td><td>"+student_data["student_data"][i][0]+"</td><td>"+student_data["student_data"][i][1]+"</td><td>"+student_data["student_data"][i][2]+"</td><td>"+student_data["student_data"][i][3]+"</td><td>"+student_data["student_data"][i][4]+"</td></tr>"
                    );
                }
            }
        }
        else if(degree==='none' && start_year==='none' && end_year==='none'){
            for(i=0;i<student_data["student_data"].length;i++){
                    table.append(
                        "<tr><td><input id=\""+student_data["student_data"][i][0]+"\" class=\"filter-checkbox\" onclick=\"click_on_checkbox('"+student_data["student_data"][i][0]+"');\" type=\"checkbox\" value='"+student_data["student_data"][i][0]+"'></td><td>"+student_data["student_data"][i][0]+"</td><td>"+student_data["student_data"][i][1]+"</td><td>"+student_data["student_data"][i][2]+"</td><td>"+student_data["student_data"][i][3]+"</td><td>"+student_data["student_data"][i][4]+"</td></tr>"
                    );
            }

        }
    }
}

//CheckBoxes
$('.select-all').click(function(){
    if(this.checked){
        for(i=0;i<$('.filter-checkbox').length;i++){
            $('.filter-checkbox')[i].checked=true;
        }
        $('#message-numbers').html($('.filter-checkbox').length);
    }
    else {
        for(i=0;i<$('.filter-checkbox').length;i++){
            $('.filter-checkbox')[i].checked=false;
        }
        $('#message-numbers').html(0);
    }
});
function click_on_checkbox(roll_no) {
    var this_id = '#'+roll_no;
    if($(this_id).is(':checked')){
        $('#message-numbers').html(parseInt($('#message-numbers').html())+1);
    }
    else {
        $('#message-numbers').html(parseInt($('#message-numbers').html())-1);
    }
}

// Generate Degree

function generate() {
    var checkedId = [];
    $(".filter-checkbox").each(function(){
        var $this = $(this);
        if($this.is(":checked")){
            checkedId.push($this.attr("id"));
        }
    });
    window.location.href = 'generate_degree.php?roll_no='+checkedId;
}
function resettotaldegrees() {
    if (confirm("Do you really want to reset total degrees to 0 for all years!")) {
        var request = $.ajax({
            url: "reset_total_degrees.php",
            type: "post"
        });
        request.done(function (response, textStatus, jqXHR){
            alert("Counting Reseted");
        });
        request.fail(function (jqXHR, textStatus, errorThrown) {
            alert(
                "The following error occurred: " +
                textStatus+"Error:"+errorThrown
            );
        });
    }

}
function deletealldegrees() {
    if (confirm("Do you really want to Delete all previously generated degrees")) {
        var request = $.ajax({
            url: "delete_total_degrees.php",
            type: "post"
        });
        request.done(function (response, textStatus, jqXHR){
            alert("All previous degrees deleted!");
        });
        request.fail(function (jqXHR, textStatus, errorThrown) {
            alert(
                "The following error occurred: " +
                textStatus+"Error:"+errorThrown
            );
        });
    }
}
function deleteallqr() {
    if (confirm("Do you really want to Delete all previously generated QR Codes")) {
        var request = $.ajax({
            url: "delete_all_QR.php",
            type: "post"
        });
        request.done(function (response, textStatus, jqXHR){
            alert("All QR codes deleted!");
        });
        request.fail(function (jqXHR, textStatus, errorThrown) {
            alert(
                "The following error occurred: " +
                textStatus+"Error:"+errorThrown
            );
        });
    }
}