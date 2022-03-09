// function random_item(items)
// {
  
// return items[Math.floor(Math.random()*items.length)];
     
// Array of src urls from pool of content
const srcArray = [];
srcArray[0] = 'https://docs.google.com/presentation/d/1C9R1uJ3UxTYtFIvq5gJJqNN4mo3kpLpk-dIRYZLBVXc/preview?rm=minimal&slide=id.g1163cbbd3f2_0_0',
srcArray[1] = 'https://docs.google.com/presentation/d/1C9R1uJ3UxTYtFIvq5gJJqNN4mo3kpLpk-dIRYZLBVXc/preview?rm=minimal&slide=id.g1163cbbd3f2_0_254',
srcArray[2] = 'https://docs.google.com/presentation/d/1C9R1uJ3UxTYtFIvq5gJJqNN4mo3kpLpk-dIRYZLBVXc/preview?rm=minimal&slide=id.g1163cbbd3f2_0_5',
srcArray[3] = 'https://docs.google.com/presentation/d/1C9R1uJ3UxTYtFIvq5gJJqNN4mo3kpLpk-dIRYZLBVXc/preview?rm=minimal&slide=id.g1163cbbd3f2_2_0',
srcArray[4] = 'https://docs.google.com/presentation/d/1C9R1uJ3UxTYtFIvq5gJJqNN4mo3kpLpk-dIRYZLBVXc/preview?rm=minimal&slide=id.g11435c5e347_0_0',
srcArray[5] = 'https://docs.google.com/presentation/d/1C9R1uJ3UxTYtFIvq5gJJqNN4mo3kpLpk-dIRYZLBVXc/preview?rm=minimal&slide=id.g11435c5e347_0_4'

function shuffle(array) {
    let currentIndex = array.length,  randomIndex;
  
    // While there remain elements to shuffle...
    while (currentIndex != 0) {
  
      // Pick a remaining element...
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex--;
  
      // And swap it with the current element.
      [array[currentIndex], array[randomIndex]] = [
        array[randomIndex], array[currentIndex]];
    }
  
    return array;
  }

  function srcSwap(){
      //check if the array is empty and refresh it
      if (srcArray.length <= 1) {
          location.reload();
      }

      //shuffle sources
      shuffle(srcArray);

      //take the last one for the iFrame src
      document.getElementById('zero').src = srcArray.pop();
  }

  srcSwap();
  setInterval(srcSwap, 8000);
