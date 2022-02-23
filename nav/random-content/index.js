// function random_item(items)
// {
  
// return items[Math.floor(Math.random()*items.length)];
     
// }

// var items = [254, 45, 212, 365, 2543];
// console.log(random_item(items));
var iFrameSource = document.getElementById('zero').src;
const srcArray = [];
srcArray[0] = 'https://docs.google.com/presentation/d/1C9R1uJ3UxTYtFIvq5gJJqNN4mo3kpLpk-dIRYZLBVXc/preview?rm=minimal&slide=id.g1163cbbd3f2_0_0',
srcArray[1] = 'https://docs.google.com/presentation/d/1C9R1uJ3UxTYtFIvq5gJJqNN4mo3kpLpk-dIRYZLBVXc/preview?rm=minimal&slide=id.g1163cbbd3f2_0_254',
srcArray[2] = 'https://docs.google.com/presentation/d/1C9R1uJ3UxTYtFIvq5gJJqNN4mo3kpLpk-dIRYZLBVXc/preview?rm=minimal&slide=id.g1163cbbd3f2_0_5'

//function to grab random array url
function myFunction(items) {
    //console.log("hello"); 1
    //console.log(iFrameSource); 2
    return items[Math.floor(Math.random()*items.length)];
}

//console.log(myFunction(srcArray)); 3
function srcSwap(){
    //variable to store the new src
    var newId = myFunction(srcArray);
    //variable to store the current id
    var currentId = document.getElementById('zero').src;
    //check to make sure the new id is not the same as the current before updating the src
    if(newId == currentId) {
        return srcSwap()
    } else {
        document.getElementById('zero').src = newId;
    }

}

//runs the shuffle constantly, works just comment out for development
setInterval(srcSwap, 3000);