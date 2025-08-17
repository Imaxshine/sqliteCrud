function SaveBtn(){
    document.querySelector('#myForm').addEventListener('submit', async ev => {
        ev.preventDefault()
       try {
           let userName = document.getElementById('name').value;
           let userEmail = document.getElementById('email').value;
           let password = document.getElementById('password').value;

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
               console.log(readFeedBack)
           }

       }catch (error){
            console.log(error);
       }

    })
}