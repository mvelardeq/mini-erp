document.getElementById("foto").onchange = function(e) {
	let reader = new FileReader();

  reader.onload = function(){
    let preview = document.getElementById('preview'),
    		image = document.createElement('img');

    image.src = reader.result;

    preview.innerHTML = '';
    preview.append(image);
    image.style.maxWidth = '90%';
    image.style.display = 'block';
    image.style.margin = 'auto';
  };

  reader.readAsDataURL(e.target.files[0]);
}
