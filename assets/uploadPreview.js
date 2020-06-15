
let filesInput = document.getElementById(`myImg`);
let imgsPreview = document.getElementById(`imgsPreview`);
let nodePreview = document.querySelector(`.preview`);	
function myname() {
let files = filesInput.files;
let i=0;
for (const key in files) {
	if (files.hasOwnProperty(key)) {
		const element = files[key];
		let oFReader = new FileReader();
		oFReader.readAsDataURL(element);
		if (i > 0) {
			let newNodePreview = nodePreview.cloneNode(true);
			oFReader.onload	= function(oFREvent) {
				newNodePreview.setAttribute('src', oFREvent.target.result);
				imgsPreview.appendChild(newNodePreview);
				}
		
		} else {
			oFReader.onload	= function(oFREvent) {
				nodePreview.setAttribute('src', oFREvent.target.result);
				}
		}
	}
	i++;
}

}
		

