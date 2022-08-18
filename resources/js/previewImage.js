let inputFile = document.querySelector('#user-img-btn');
inputFile.onchange = function () {
    let files = this.files;
    if(files.length !== 0) {
        let obj = new FileReader();
        obj.onload = function (data) {
            document.querySelector('#userImg').src = data.target.result;
        }
        obj.readAsDataURL(files[0]);
    }
}
