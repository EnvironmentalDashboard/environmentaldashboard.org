//This file contains the scripts used to make the ajlc controller interactive, it does not contain the scripts that link the buttons to digital signage.
const btnOne = document.getElementById('menuBtn1')
    
btnOne.addEventListener('click', openOne);

//function to open a carousel
function openOne() {
    if (panelOne.classList == 'panel open'){
        toggleOff();    
    } else {
        toggleOff();
        panelOne.classList.toggle('open')
        panelTwo.classList.toggle('close')
        panelThree.classList.toggle('close')
        descriptions[0].style.visibility = "visible";
    }
}

//function to close the carousels
function toggleOff() {
    const panels = [panelOne, panelTwo, panelThree]
    panels.forEach(panel => {
        panel.classList = 'panel';
    });
    descriptions[0].style.visibility = "hidden";
    descriptions[1].style.visibility = "hidden";
    descriptions[2].style.visibility = "hidden";
}