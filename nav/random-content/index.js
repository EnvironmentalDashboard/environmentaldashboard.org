// function random_item(items)
// {
  
// return items[Math.floor(Math.random()*items.length)];
     
// Array of src urls from pool of content
const srcArray = [];
srcArray[0] = 'https://docs.google.com/presentation/d/1f2byL-w1dgvq9SN4P5C7dVwXllTWviNyzVARsigJx2c/preview?rm=minimal&slide=id.g103178f87ab_1_3',
srcArray[1] = 'https://docs.google.com/presentation/d/1f2byL-w1dgvq9SN4P5C7dVwXllTWviNyzVARsigJx2c/preview?rm=minimal&slide=id.g111ba68a46d_0_0',
srcArray[2] = 'https://docs.google.com/presentation/d/1f2byL-w1dgvq9SN4P5C7dVwXllTWviNyzVARsigJx2c/preview?rm=minimal&slide=id.g111ba68a46d_0_15',
srcArray[3] = 'https://docs.google.com/presentation/d/1f2byL-w1dgvq9SN4P5C7dVwXllTWviNyzVARsigJx2c/preview?rm=minimal&slide=id.g111ba68a46d_0_34',
srcArray[4] = 'https://docs.google.com/presentation/d/1f2byL-w1dgvq9SN4P5C7dVwXllTWviNyzVARsigJx2c/preview?rm=minimal&slide=id.g111ba68a46d_0_50',
srcArray[5] = 'https://docs.google.com/presentation/d/1f2byL-w1dgvq9SN4P5C7dVwXllTWviNyzVARsigJx2c/preview?rm=minimal&slide=id.g111ba68a46d_0_63',
srcArray[6] = 'https://docs.google.com/presentation/d/1f2byL-w1dgvq9SN4P5C7dVwXllTWviNyzVARsigJx2c/preview?rm=minimal&slide=id.g111ba68a46d_0_76',
srcArray[7] = 'https://docs.google.com/presentation/d/1f2byL-w1dgvq9SN4P5C7dVwXllTWviNyzVARsigJx2c/preview?rm=minimal&slide=id.g111ba68a46d_0_89',
srcArray[8] = 'https://docs.google.com/presentation/d/1f2byL-w1dgvq9SN4P5C7dVwXllTWviNyzVARsigJx2c/preview?rm=minimal&slide=id.g111ba68a46d_0_104',
srcArray[9] = 'https://docs.google.com/presentation/d/1f2byL-w1dgvq9SN4P5C7dVwXllTWviNyzVARsigJx2c/preview?rm=minimal&slide=id.g111ba68a46d_0_117',
srcArray[10] = 'https://docs.google.com/presentation/d/1f2byL-w1dgvq9SN4P5C7dVwXllTWviNyzVARsigJx2c/preview?rm=minimal&slide=id.g111ba68a46d_0_130',
srcArray[11] = 'https://docs.google.com/presentation/d/1f2byL-w1dgvq9SN4P5C7dVwXllTWviNyzVARsigJx2c/preview?rm=minimal&slide=id.g1157155363f_1_0',
srcArray[12] = 'https://docs.google.com/presentation/d/1f2byL-w1dgvq9SN4P5C7dVwXllTWviNyzVARsigJx2c/preview?rm=minimal&slide=id.g1157155363f_1_11',
srcArray[13] = 'https://docs.google.com/presentation/d/1f2byL-w1dgvq9SN4P5C7dVwXllTWviNyzVARsigJx2c/preview?rm=minimal&slide=id.g1157155363f_1_22'

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
