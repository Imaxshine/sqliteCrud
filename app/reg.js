    document.querySelector('#myForm').addEventListener('submit', async ev => {
        ev.preventDefault()
       try {
           let userName = document.getElementById('name').value;
           let userEmail = document.getElementById('email').value;
           let password = document.getElementById('password').value;

           if (userName.trim() === ""){
               Dialog('<span class="alert alert-info">Username field is required! </span>');
               return;
           }
           if (userEmail.trim() === ""){
               Dialog('<span class="alert alert-info">User email field is required! </span>');
               return;
           }
           if (password.trim() === ""){
               Dialog('<span class="alert alert-info">Password field is required! </span>');
               return;
           }
           function Dialog(text){
            document.getElementById('text').innerHTML = text;
            document.getElementById('text').style.marginTop = "26px";
            document.getElementById('myDialog').showModal();
           }

           let Data = new FormData()
           // Add values to the form data
           Data.append('name', userName)
           Data.append('email', userEmail)
           Data.append('password', password)

           let Path = window.location.origin;
           let MainPath = `${Path}/database/save`
           let response = await fetch(MainPath, {
               method: "POST",
               body:Data
           });
           if (response.ok){
               let readFeedBack = await response.text()
               Dialog(readFeedBack)
               document.getElementById('name').value = "";
               document.getElementById('email').value = "";
               document.getElementById('password').value = "";
           }

       }catch (error){
            console.log(error);
       }

    });

    // Open Posts Method
async function OpenPosts(){
    function Dialog(text){
        document.getElementById('myDialog').style.height = "auto";
        document.getElementById('myDialog').style.width = "80vw";

        document.getElementById('text').innerHTML = text;
        document.getElementById('text').style.marginTop = "26px";
        document.getElementById('myDialog').showModal();
    }
    let Path = window.location.origin;
    let MainPath = `${Path}/database/posts`

    let features = "width=800,height=600,left=200,top=100,"+
                          "menubar=no,toolbar=no,location=no,status=no,"+
                         "resizable=yes,scrollbars=yes";


    window.open(MainPath, "", features);

    // console.log(response);
    
    // Dialog(MainPath)

}
function Save(){
    Dialog(`<span class="alert alert-info">Please wait a moment...</span>`);
    function Dialog(text){
        document.getElementById('text').innerHTML = "";
        document.getElementById('text').innerHTML = text;
        document.getElementById('text').style.marginTop = "26px";
        document.getElementById('myDialog').showModal();
    }
}

