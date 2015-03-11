/**
 * Перечисляю основные параметры
 */
var cnt = 0;
var maxCnt = 50;
var timeInt = 5;
var hightModalWindow = 0;
var modalWindow = document.getElementById('modal-wnd-content');
var modalWrap = document.getElementById('modal-wnd-wrap');
var windowHeight = parseFloat(document.body.clientHeight);
var step = ((windowHeight - hightModalWindow) / 2) / maxCnt;
modalWindow.style.top = 0;
var modalPosition = parseFloat(modalWindow.style.top);
modalWindow.style.opacity = 0;
modalWrap.style.opacity = 0;
var transparency = 0;

var intervalShow;
//modalWrap.addEventListener('click', action);

/**
 * action() обозначивает обертку и в зависимости от
 * условия запускает в интервале либо hideModal либо
 * showModal
 */
function action() {
    modalWrap.style.display = 'block';
    refreshWindowsAdd()
    $('.modal-wnd-body span input').val('');
    $('.modal-wnd-body span input').attr('placeholder', 'Name');
    $('.modal-wnd-body span').css('border', '');

    window.frames['richTextField'].document.body.innerHTML = '';

    if (!intervalShow) {
        if (((windowHeight - hightModalWindow) / 2) <= parseFloat(modalWindow.style.top)) {
            intervalShow = setInterval(hideModal, timeInt);

        } else {
            intervalShow = setInterval(showModal, timeInt);
            modalWrap.addEventListener('click', action);
        }
    }
}

function actionUpload() {
        modalWrap.style.display = 'block';

        refreshWindowsAdd()
            //   $('.modal-wnd-body span input').attr('type', 'file');
            //    $('#menuNewFile').css('display', 'none');
            //    window.frames['richTextField'].document.body.innerHTML = '';

        $('.modal-wnd-body span input').attr('type', 'file').attr('accept', 'image/jpeg, image/png').attr('id', 'addImage');
        $('.modal-wnd-body select').css('display', 'none');
        $('#saveButtom').removeAttr('onclick').attr('onclick', 'saveContentNewImg()');
        createList()
        if (!intervalShow) {
            if (((windowHeight - hightModalWindow) / 2) <= parseFloat(modalWindow.style.top)) {
                
                intervalShow = setInterval(hideModal, timeInt);
            } else {
                intervalShow = setInterval(showModal, timeInt);
                modalWrap.addEventListener('click', action);
            }
        }
    }
    /**
     * cancelBubble() отменяет всплытие
     * @param: приходит событие на данный элемент
     */
function cancelBubble(ev) {
    if (!ev) {
        ev = window.event;
    }
    ev.cancelBubble = true;
}

/**
 * showModal() с заданным интервалом прорисовывает
 * окно и позицию.
 */
function showModal() {
    if (cnt != maxCnt) {
        modalPosition += step;
        transparency += 0.02;
        modalWindow.style.top = modalPosition + 'px';
        modalWindow.style.opacity = transparency;
        modalWrap.style.opacity = transparency;
        cnt++;
    } else {
        clearInterval(intervalShow);
        cnt = 0;
        intervalShow = null;
    }
}

/**
 * hideModal() с заданным интервалом убирает
 * окно и позицию.
 */
function hideModal() {
    refreshWindowPreview();
    if (cnt != maxCnt) {
        modalPosition -= step;
        transparency -= 0.02;
        modalWindow.style.top = modalPosition + 'px';
        modalWindow.style.opacity = transparency;
        modalWrap.style.opacity = transparency;
        cnt++;
    } else {
        clearInterval(intervalShow);
        cnt = 0;
        intervalShow = null;
        modalWrap.style.display = 'none';
    }
}

function createContent() {
    $('#modal-wnd-content').css('width', 600).css('height', 400);
    $('.modal-wnd-body').css('height', 335);
    /*.append('<div id="wysiwyg" style=" width=540px""><input type="button" onClick="iBold()" value="B" /><input type="button" onClick="iUnderline()" value="U" /><input type="button" onClick="iItalic()" value="I" /><input type="button" onClick="iImage()" value="Image" /></div>');
        
    $('.modal-wnd-body').append('<p><textarea id="textAreaBody" wrap rows="3" style="display:none;"></textarea>');
    $('.modal-wnd-body').append('<iframe name="richTextField" id="richTextField" style="border:#000 1px solid;width:540px;height:300px;"></iframe>');*/
    $('#wysiwyg').css('display', 'block');
    $('.modal-wnd-body span').css('display', 'none');
    $('.modal-wnd-body select').css('display', 'none');
    $('#saveButtom').removeAttr('onclick')
        .css('margin-left', '220px')
        .css('margin-right', '50px')
        .css('padding', '6px 20px')
        .attr('value', 'Save').attr('onclick', 'saveContentNewFile()');
    /*$('#textAreaBody').css('resize', 'none')
        .css('width', 540)
        .css('height', 300);*/
    modalWrap.removeEventListener('click', action);
    iFrameOn();
}

/*function createContentJpg(){
    $('.modal-wnd-body span input').attr('type', 'file').attr('accept', 'image/jpeg').attr('id', 'addImage');
    $('.modal-wnd-body select').css('display', 'none');
    $('#saveButtom').removeAttr('onclick').attr('onclick', 'saveContentNewImg()');
}*/

function contentPreview() {
    $('#modal-wnd-content').css('width', 600).css('height', 400);
    $('.modal-wnd-body').css('height', 355);
    /*.append('<div id="wysiwyg" style=" width=540px""><input type="button" onClick="iBold()" value="B" /><input type="button" onClick="iUnderline()" value="U" /><input type="button" onClick="iItalic()" value="I" /><input type="button" onClick="iImage()" value="Image" /></div>');
        
    $('.modal-wnd-body').append('<p><textarea id="textAreaBody" wrap rows="3" style="display:none;"></textarea>');
    $('.modal-wnd-body').append('<iframe name="richTextField" id="richTextField" style="border:#000 1px solid;width:540px;height:300px;"></iframe>');*/
    $('#wysiwyg').css('display', 'none');
    $('.modal-wnd-body span').css('display', 'none');
    $('.modal-wnd-body select').css('display', 'none');
    $('#saveButtom').css('display', 'none');
    $('#cancelButtom').css('display', 'none');

    /*$('#textAreaBody').css('resize', 'none')
        .css('width', 540)
        .css('height', 300);*/
    modalWrap.removeEventListener('click', action);
    //iFrameOn();
}

function refreshWindowsAdd() {
    $('#addImage').removeAttr('style');
    $('#modal-wnd-content').css('width', 300).css('height', 150);
    $('.modal-wnd-body span input').removeAttr('accept').removeAttr('id').attr('type', 'text');
    $('.modal-wnd-body').css('height', 70);
    $('#wysiwyg').css('display', 'none');
    $('.modal-wnd-body span').css('display', '');
    $('.modal-wnd-body select').css('display', '');
    $('#saveButtom').attr('onclick', 'saveFile()')
        .css('margin-left', '85px')
        .attr('value', 'Ok');
    $('#saveButtom').css('display', '');
    $('#cancelButtom').css('display', '');

}

function refreshWindowPreview() {
    $('#modal-wnd-content').removeAttr('style');
    $('#modal-wnd-content').css('background-position', '');
    $('#modal-wnd-content').css('width', '300px');
    $('#modal-wnd-content').css('height', '150px');
    $('#modal-wnd-content').css('margin-top', '-100px');
    $('#modal-wnd-content').css('position', 'relative');
    $('.modal-wnd-title').css('background', '#667');
    $('.modal-wnd-title span').text('New file');
}