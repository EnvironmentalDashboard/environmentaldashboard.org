//This file contains the scripts used to make the ajlc controller interactive, it does not contain the scripts that link the buttons to digital signage.

//function to navigate carousel with spots eventurally this will need to be adapted for swiping on an iPad
document.querySelectorAll(".carousel").forEach((carousel) => {
    const items = carousel.querySelectorAll(".carousel_item");
    const buttonsHtml = Array.from(items, () => {
        return `<span class="carousel_button"></span>`;
    });
    console.table(buttonsHtml)
    
    carousel.insertAdjacentHTML(
        "beforeend",
        `
        <div class="carousel_nav">
        ${buttonsHtml.join("")}
        </div>
        `
        );
        
        const buttons = carousel.querySelectorAll(".carousel_button");
        
        buttons.forEach((button, i) => {
            button.addEventListener("click", () => {
                // un-select all the items
                items.forEach((item) =>
                item.classList.remove("carousel_item--selected")
                );
                buttons.forEach((button) =>
                button.classList.remove("carousel_button--selected")
                );
                
                items[i].classList.add("carousel_item--selected");
                button.classList.add("carousel_button--selected");
            });
            // Select the first item on page load
            items[0].classList.add("carousel_item--selected");
            buttons[0].classList.add("carousel_button--selected");
        });
        
    });

//function to open a carousel
const root_buttons = Array.from(document.querySelectorAll(".button"));
console.log(root_buttons);
const root_carousels = Array.from(document.querySelectorAll(".carousel"));
console.log(root_carousels);

root_buttons.forEach((button, i) => {
    button.addEventListener("click", () => {
        root_carousels.forEach((carousel) => {
            carousel.classList.remove("carousel--selected");
        })
        root_carousels[i].classList.add("carousel--selected");
        console.log(root_carousels[i]);
    })
})


//function to close the carousels
