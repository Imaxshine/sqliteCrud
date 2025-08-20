async function EditData(EditId){
    try{
        let Id = EditId.getAttribute('data-editId');
        // let data = new FormData()
        // data.append('id',Id);
        let Path = window.location.origin;
        let MainPath = `${Path}/database/edit`;

        if (MainPath){
            let token = encodeURIComponent(Id * 39411);
            let w = window.open(MainPath + `?id=${token}`, "page", "width=500, height=600, left=100")
        }
        function Dialog(text){
            document.getElementById('text').innerHTML = `${text}`;
            document.getElementById('myDialog').showModal();
        }
        // // Dialog(MainPath);
        //
        // let response = await fetch(MainPath, {
        //     method:"POST",
        //     body:data
        // });
        // if (response.ok){
        //     //Read the responses as text
        //     let feedBack = await response.text();
        //     // Dialog(feedBack);
        // }
        // console.log(response)
    }catch (er){
        Dialog(`<p class="alert alert-danger">Error, Just check if you are really connected to the internet</p>`)
    }
}