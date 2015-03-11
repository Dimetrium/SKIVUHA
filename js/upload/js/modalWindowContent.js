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
   // modalWindow.style.opacity = 0;
   // modalWrap.style.opacity = 0;
var transparency = 0;

var intervalShow;


/**
 * action() обозначивает обертку и в зависимости от 
 * условия запускает в интервале либо hideModal либо
 * showModal
 */
function actionContent(){
    modalWrap.style.display = 'block';
    if(!intervalShow){
        if( ((windowHeight - hightModalWindow)/2) <= parseFloat(modalWindow.style.top) ){
            intervalShow = setInterval(hideModalContent, timeInt);
        }else{
            intervalShow = setInterval(showModalContent, timeInt);
        }
    }
}

/**
 * showModal() с заданным интервалом прорисовывает
 * окно и позицию.
 */
function showModalContent(){
    if (cnt != maxCnt){
        modalPosition += step;
        transparency += 0.02;
        modalWindow.style.top = modalPosition + 'px';
        modalWindow.style.opacity = transparency;
        modalWrap.style.opacity = transparency;
        cnt++;
    }else{
        clearInterval(intervalShow);
        cnt = 0;
        intervalShow = null;
    }
}

/**
 * hideModal() с заданным интервалом убирает
 * окно и позицию.
 */
function hideModalContent(){
    if (cnt != maxCnt){
        modalPosition -= step;
        transparency -= 0.02;
        modalWindow.style.top = modalPosition + 'px';
        modalWindow.style.opacity = transparency;
        modalWrap.style.opacity = transparency;
        cnt++;
    }else{
        clearInterval(intervalShow);
        cnt = 0;
        intervalShow = null;
        modalWrap.style.display = 'none';
    }
}