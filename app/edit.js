document.getElementById('myForm').addEventListener('submit',  function(event){
    event.preventDefault();
});

    async function Edit(details){
       try{
           const Name = document.getElementById('name').value;
           const Email = document.getElementById('email').value;
           const uniqId = details.getAttribute('data-userId')

           // let data = new FormData();
           // data.append('name', Name);
           // data.append('email', Email);
           // data.append('id', uniqId);
          let MainPath = window.location.origin + `/database/process_edit`;
          let responses = await fetch(MainPath, {
              headers:{"Content-Type":"application/json"},
              method:"POST",
              body:JSON.stringify({Name, Email, uniqId})
          });
           // console.log(responses)
          if (responses.ok){
              // Read responses as JSON;
              let feedBack = await responses.json()
              console.log(feedBack);
          }

       }catch (e) {

       }
    }

