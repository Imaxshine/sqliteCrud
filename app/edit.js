document.getElementById('myForm').addEventListener('submit',  function(event){
    event.preventDefault();
});

    async function Edit(details){
       try{
           document.getElementById('results').innerHTML = `<p class="alert alert-info">Please wait a moment...</p>`;
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
              if (feedBack.message){
                  document.getElementById('results').innerHTML = `${feedBack.message}`;
                  setTimeout(()=>{
                      document.getElementById('results').style.display = "none";
                      window.close();
                  }, 4000);

              }else{
                  document.getElementById('results').innerHTML = `${feedBack.error}`;
              }
          }else{
              document.getElementById('results').innerHTML = `<p class="alert alert-danger">Something went wrong, try again later</p>`;
          }

       }catch (e) {
           document.getElementById('results').innerHTML = `<p class="alert alert-danger"> Oops! Some errors occur, try again later.</p>`;
       }
    }

