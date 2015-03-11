var row = '';
var nameFile;
var sortName = 2;
var sortType = 0;
var sortSize = 0;
var statusBookmark = 0;
var fileName = '';
var typeNewFile = '';


function cancelBubble(ev) {
    if (!ev) {
        ev = window.event;
    }
    ev.cancelBubble = true;
}

$(document).ready(function () {
    createList(); //создаем список файлов из локала
    //получаем название выбранного файла с расширением
    $('#data').bind('click', function () {
        var target = event.target || event.srcElement;
        target = target.parentNode;
        $('#data tr').removeAttr('style');
        target.style.backgroundColor = '#cfc';
        $('#fileSelected').text(target.firstChild.innerHTML);
        nameFile = $('#fileSelected').html();
        data = JSON.parse(localStorage.getItem(nameFile));
        data = data.data;
        $('#action a').attr('href', data).attr('download', nameFile);
        $('#menuDefault').attr('style', 'display: none');
        $('#menu').attr('style', 'display: block');
        $('body').on('click',
            function (event) {
                var tableArea = $(event.target).parents().filter('#data').length;
                var menuArea = $(event.target).parents().filter('#action').length;
                if (tableArea === 0 && menuArea === 0) {
                    $('#menuDefault').attr('style', 'display: block');
                    $('#menu').attr('style', 'display: none');
                    $('#data tr').attr('style', 'background-color: #fff');
                }
            }
        )
    });
})

/*function newFile() {
    var resurs = $('#dropdown :selected').text();
    var items = $('#name').val();
    items = items.trim();
    var keyFile = resurs + '_' + items;
    console.log(items);
    console.log(resurs);
}*/


function getListFile() {
    var arrayLs = [];
    $.each(localStorage,
        function (index, value) {
            var a = JSON.parse(value);
            arrayLs[arrayLs.length] = JSON.parse(value);
        })
    return arrayLs;
}

function sortByName() {
    sortName++;
    $('#glyphiconFileType').attr('class', '');
    $('#glyphiconFileSize').attr('class', '');
    if (sortName % 2 === 0) {
        var up = 1;
        var down = -1;
        $('#glyphiconFileName').attr('class', 'glyphicon glyphicon-triangle-bottom');
    } else {
        var up = -1;
        var down = 1;
        $('#glyphiconFileName').attr('class', 'glyphicon glyphicon-triangle-top');
    }
    var arrayObj = getListFile();
    var byName = arrayObj.slice(0);
    byName.sort(function (a, b) {
        var first = a.name.toLowerCase();
        var second = b.name.toLowerCase();
        return first < second ? down : second < first ? up : 0;
    });
    $('#data tr td').parent(1).empty();
    createFileList(byName);
}

function sortByType() {
    sortType++;
    $('#glyphiconFileName').attr('class', '');
    $('#glyphiconFileSize').attr('class', '');
    if (sortType % 2 === 0) {
        var up = 1;
        var down = -1;
        $('#glyphiconFileType').attr('class', 'glyphicon glyphicon-triangle-bottom');
    } else {
        var up = -1;
        var down = 1;
        $('#glyphiconFileType').attr('class', 'glyphicon glyphicon-triangle-top');
    }
    var arrayObj = getListFile();
    var byType = arrayObj.slice(0);
    byType.sort(function (a, b) {
        var first = a.type.toLowerCase();
        var second = b.type.toLowerCase();
        return first < second ? down : second < first ? up : 0;
    });
    $('#data tr td').parent(1).empty();
    createFileList(byType);
}

function sortBySize() {
    sortSize++;
    $('#glyphiconFileName').attr('class', '');
    $('#glyphiconFileType').attr('class', '');

    var arrayObj = getListFile();
    var bySize = arrayObj.slice(0);
    bySize.sort(function (a, b) {
        if (sortSize % 2 === 0) {
            var up = b;
            var down = a;
            $('#glyphiconFileSize').attr('class', 'glyphicon glyphicon-triangle-bottom');
        } else {
            var up = a;
            var down = b;
            $('#glyphiconFileSize').attr('class', 'glyphicon glyphicon-triangle-top');
        }
        return down.size - up.size;
    });
    $('#data tr td').parent(1).empty();
    createFileList(bySize);
}

function createFileList(obj) {

    $.each(obj,
        function (index, value) {
            row += '<tr>';
            var obj = value;
            $.each(obj,
                function (index, value) {
                    if (obj.bookmark == 'false') {
                        if (index != 'bookmark' && index != 'data') {
                            row += '<td>' + value + '</td>';
                        }
                    }
                })
        })
    row += '</tr>';
    $('#data').append(row);
    row = '';
}

function createList() {
    var lsFile = localStorage.length;
    $('#buttonFile').attr('class', 'btn btn-default btn-md active');
    $('#buttonBookmark').attr('class', 'btn btn-default btn-md');
    $('#data tr td').parent(1).empty();
    if (lsFile > 0) {
        for (var i = 0; i < lsFile; i++) {
            var key = localStorage.key(i);
            var objFile = JSON.parse(localStorage[key])
            row += '<tr>';
            $.each(objFile,
                function (index, value) {
                    if (index != 'bookmark' && index != 'data') {
                        if (objFile.bookmark == 'true') {
                            row += '<td style = "font-weight: bold;">' + value + '</td>';
                        } else {
                            row += '<td>' + value + '</td>';
                        }
                    }
                })
            row += '</tr>';
        }
        $('#data').append(row);
        row = '';
    }
    statusBookmark = 0;
}


function mySearchFile() {
    var lsFile = localStorage.length;
    $('#data tr td').parent(1).empty();
    var val = $('#mySearch').val();
    if (val !== null && val !== '') {
        if (lsFile > 0) {
            for (var i = 0; i < lsFile; i++) {
                var key = localStorage.key(i);

                if (val.indexOf('*') >= 0) {
                    val = val.replace('*', '.');
                }
                var reg = '(' + val + '.*)';
                var found = key.match(new RegExp(reg, 'i'));
                if (found != null) {
                    found = found[0];
                } else {
                    found = false;
                }
                if (key === found) {
                    var objFile = JSON.parse(localStorage[key])
                    row += '<tr>';
                    $.each(objFile,
                        function (index, value) {
                            if (index != 'bookmark' && index != 'data') {
                                if (objFile.bookmark == 'true') {
                                    row += '<td style = "font-weight: bold;">' + value + '</td>';
                                } else {
                                    row += '<td>' + value + '</td>';
                                }
                            }
                        })
                    row += '</tr>';
                }
            }
            $('#data').append(row);
            row = '';
        }
    } else {
        createList();
    }
}

function addToBookmark() {
    var some = JSON.parse(localStorage.getItem(nameFile));
    if (some.bookmark === 'false') {
        some.bookmark = 'true';
    } else {
        some.bookmark = 'false';
    }
    localStorage[nameFile] = JSON.stringify(some);
    $('#data tr td').parent(1).empty();
    if (statusBookmark === 0) {
        createList();
    } else {
        createListBookmark();
    }
}

function createListBookmark() {
        var lsFile = localStorage.length;
        $('#buttonFile').attr('class', 'btn btn-default btn-md');
        $('#buttonBookmark').attr('class', 'btn btn-default btn-md active');
        $('#data tr td').parent(1).empty();
        if (lsFile > 0) {
            for (var i = 0; i < lsFile; i++) {
                var key = localStorage.key(i);
                var objFile = JSON.parse(localStorage[key])
                row += '<tr>';
                $.each(objFile,
                    function (index, value) {
                        if (index != 'bookmark' && index != 'data') {
                            if (objFile.bookmark == 'true') {
                                row += '<td style = "font-weight: 400;">' + value + '</td>';
                            }
                        }
                    })
                row += '</tr>';
            }
            $('#data').append(row);
            row = '';
        }
        statusBookmark = 1;
    }
    /*
    function startPosition() {
        $('#menuDefault').attr('style', 'display: block');
        $('#menu').attr('style', 'display: none');
        $('#data tr').attr('style', 'background-color: #fff');
    }*/
function editCurentFile() {
    var objToEdit = JSON.parse(localStorage.getItem(nameFile));
    fileName = objToEdit.name;
    $('.modal-wnd-title span').text('Edit: ' + fileName);
    typeNewFile = objToEdit.type;
    if (objToEdit.type === 'Plain Text File' || objToEdit.type === 'Web page') {
        action();
        createContent();
        //sandbox="allow-same-origin allow-scripts"
        window.frames['richTextField'].document.body.innerHTML = objToEdit.data;
    }
}

function previewCurentFile() {
    var objTopreview = JSON.parse(localStorage.getItem(nameFile));
    fileName = objTopreview.name;
    objTopreview = 'background: url(' + objTopreview.data + ') no-repeat';
    action();
    contentPreview();
    $('#modal-wnd-content').attr('style', objTopreview);
    $('#modal-wnd-content').css('background-position', '50%');
    $('#modal-wnd-content').css('width', 'auto');
    $('#modal-wnd-content').css('height', 'auto');
    $('#modal-wnd-content').css('margin-top', '100px');
    $('#modal-wnd-content').css('position', 'static');
    $('.modal-wnd-title').css('background', 'none');
    $('.modal-wnd-title span').text(fileName);

    //$('iframe').attr('src', objTopreview.data)
    //window.frames['richTextField'].document.body.innerHTML = '<img height="200px" width="200px" src="'+objTopreview.data+'" />';

}

function saveFile() {
    nameNewFile = $('.modal-wnd-body input').val();
    typeNewFile = $('#menuNewFile :selected').val();
    nameNewFile = nameNewFile.trim();
    fileName = nameNewFile + '.' + typeNewFile;
    var checkeForExists = localStorage.getItem(fileName) || '';
    if (checkeForExists.length !== 0) {
        $('.modal-wnd-body input').val('');
        $('.modal-wnd-body span input').attr('placeholder', 'File exists');
        $('.modal-wnd-body span').css('border', '1px solid red');
    } else if (nameNewFile === '') {
        $('.modal-wnd-body span input').attr('placeholder', 'Wrong name of file');
        $('.modal-wnd-body span').css('border', '1px solid red');
    } else {
        if (typeNewFile === 'html') {
            typeNewFile = 'Web page';
            createContent();
        } else if (typeNewFile === 'txt') {
            typeNewFile = 'Plain Text File';
            createContent();
        }
        /*    else if (typeNewFile === 'png') {
            typeNewFile = 'Png image';
            createContentJpg();
        } else if (typeNewFile === 'jpg') {
            typeNewFile = 'Jpg image';
            createContentJpg();
        }
*/
    }
}

function saveContentNewFile() {
    if (typeNewFile === 'Plain Text File') {
        var dataNewFile = window.frames['richTextField'].document.body.innerHTML;
    } else if (typeNewFile === 'Web page') {
        var dataNewFile = window.frames['richTextField'].document.body.innerHTML;
    }
    //var dataNewFile = $('#textAreaBody').val();
    var dataNewSize = dataNewFile.length * 2;
    putDataInLocalStorage(fileName, typeNewFile, dataNewSize, dataNewFile);
    action();
}

function saveContentNewImg() {
    if (document.getElementById('addImage').files.length !== 0) {
        var nameImg = document.getElementById('addImage').files[0].name;
        var sizeImg = document.getElementById('addImage').files[0].size;
        var typeImg = document.getElementById('addImage').files[0].type;
        var checkeForExists = localStorage.getItem(nameImg) || '';
        if (checkeForExists.length !== 0) {
            $('.modal-wnd-body p').css('display', 'block').text('File exist').css('color', 'red').fa;
            setTimeout("$('.modal-wnd-body p').fadeOut('slow')", 1000);
        } else {
            if (typeImg === 'image/png') {
                typeImg = 'Png image';
            } else if (typeImg === 'image/jpeg') {
                typeImg = 'Jpg image';
            }
            getBase64Image(nameImg, typeImg, sizeImg);
            action();

        }
    } else {
        $('#addImage').css('border', '1px solid red');
    }
}

function getBase64Image(name, type, size) {
    $.support.cors = true;
    var img = new Image,
        canvas = document.createElement("canvas"),
        ctx = canvas.getContext("2d"),
        src = 'img/' + name; // insert image url here

    img.crossOrigin = 'Anonymous';
    img.onload = function () {
        canvas.width = img.width;
        canvas.height = img.height;
        ctx.drawImage(img, 0, 0);
        var data;
        if (type === 'Png image') {
            data = canvas.toDataURL("image/png");
        } else if (type === 'Jpg image') {
            data = canvas.toDataURL("image/jpeg");
        }
        putDataInLocalStorage(name, type, size, data);
        //localStorage.setItem(fileName , canvas.toDataURL("image/png"));
    }

    img.src = src;
    // make sure the load event fires for cached images too
    if (img.complete || img.complete === undefined) {
        img.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
        img.src = src;
    }
}

function putDataInLocalStorage(name, type, size, data) {
    size = Math.round(parseInt(size) / 1024, -1);
    localStorage[name] = JSON.stringify({
        'name': name,
        'type': type,
        'size': size,
        'data': data,
        'bookmark': 'false'
    });
    if (statusBookmark === 0) {
        /*var objNewFile = JSON.parse(localStorage.getItem(name));
        row += '<tr>';
        $.each(objNewFile,
            function (index, value) {
                if (index != 'bookmark' && index != 'data') {
                    row += '<td>' + value + '</td>';
                }
            })
        row += '</tr>';
        $('#data').append(row);
        row = '';*/
        createList();
    }
}

function iFrameOn() {
    richTextField.document.designMode = 'On';
    window.frames['richTextField'].document.body.focus();
}
var iBoldStatus = 1;

function iBold() {
    richTextField.document.execCommand('bold', false, null);
    iBoldStatus++;
    if (iBoldStatus % 2 === 0) {
        $('#iBold').attr('class', 'btn btn-default btn-sm active');
    } else {
        $('#iBold').attr('class', 'btn btn-default btn-sm');
    }
    window.frames['richTextField'].document.body.focus();
}
var iUnderlineStatus = 1;

function iUnderline() {
    richTextField.document.execCommand('underline', false, null);
    iUnderlineStatus++;
    if (iUnderlineStatus % 2 === 0) {
        $('#iUnderline').attr('class', 'btn btn-default btn-sm active');
    } else {
        $('#iUnderline').attr('class', 'btn btn-default btn-sm');
    }
    window.frames['richTextField'].document.body.focus();
}
var iItalicStatus = 1;

function iItalic() {
    richTextField.document.execCommand('italic', false, null);
    iItalicStatus++;
    if (iItalicStatus % 2 === 0) {
        $('#iItalic').attr('class', 'btn btn-default btn-sm active');
    } else {
        $('#iItalic').attr('class', 'btn btn-default btn-sm');
    }
    window.frames['richTextField'].document.body.focus();
}

function iImage() {
    var imgSrc = prompt('Enter path to image', '');
    if (imgSrc != null) {
        richTextField.document.execCommand('insertimage', false, 'img/' + imgSrc);
    }
}