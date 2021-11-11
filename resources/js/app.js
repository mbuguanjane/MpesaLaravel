const { default: axios } = require('axios');

require('./bootstrap');


//obtain Access Token
var AccesstokenElement = document.getElementById('getAccessToken');
if(AccesstokenElement){
    AccesstokenElement.addEventListener('click',(event)=>{
    event.preventDefault();
    axios.post('/get_token',{})
      .then((response)=>{
         
          document.getElementById("Accesstokenreceived").innerHTML=response.data;
          console.log(response)
      }).catch((error)=>{
          console.log(error)
      })
})
}

//Register URLs
var RegisterURLSElement = document.getElementById('RegisterURLS');
if(RegisterURLSElement){
document.getElementById('RegisterURLS').addEventListener('click',(event)=>{
    event.preventDefault();
    axios.post('/registerurls',{})
    .then((response)=>{
       
        document.getElementById("RegisterFeedback").innerHTML=response.data.ResponseDescription;
        console.log(response.data)
    }).catch((error)=>{
        console.log(error)
    })
})
}
//simulate Transaction
var simulateTransactionElement = document.getElementById('simulateTransaction');
if(simulateTransactionElement){
document.getElementById('simulateTransaction').addEventListener('click',(event)=>{
    event.preventDefault();

    const Requestbody={
        amount:document.getElementById('amount').value,
        account:document.getElementById('account').value,
    }
    axios.post('/simulateTransaction',Requestbody)
    .then((response)=>{
       
        document.getElementById("SimulationFeedback").innerHTML=response.data.ResponseDescription;
        console.log(response.data)
    }).catch((error)=>{
        console.log(error)
    })
})
}
//stkPush Transaction
var simulateTransactionElement = document.getElementById('stkpushTransaction');
if(simulateTransactionElement){
    simulateTransactionElement.addEventListener('click',(event)=>{
    event.preventDefault();
     
    const Requestbody={
        amount:document.getElementById('stkpushamount').value,
        account:document.getElementById('stkpushaccount').value,
        phone:document.getElementById('stkpushPhone').value,
    }
    axios.post('/stkpushTransaction',Requestbody)
    .then((response)=>{
       
        document.getElementById("stkPushFeedback").innerHTML=response.data.ResponseDescription;
        console.log(response.data)
    }).catch((error)=>{
        console.log(error)
    })
})
}
//B2c Transaction
var B2cTransactionElement = document.getElementById('B2cTransaction');
if(B2cTransactionElement){
    B2cTransactionElement.addEventListener('click',(event)=>{
    event.preventDefault();
     
    const Requestbody={
        amount:document.getElementById('b2camount').value,
        remarks:document.getElementById('b2cRemarks').value,
        phone:document.getElementById('b2cPhone').value,
        occasion:document.getElementById('b2cOccasion').value,
    }
    axios.post('/B2cTransaction',Requestbody)
    .then((response)=>{
       
        document.getElementById("stkPushFeedback").innerHTML=response.data.ResponseDescription;
        console.log(response.data)
    }).catch((error)=>{
        console.log(error)
    })
})
}