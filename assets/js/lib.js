export default function fetchRequest(data,method,url,callback){
    let request= new Request(url,{
        method:method,
        body:JSON.stringify(data)
    });

    fetch(request).then(response=>{
        return response.json();
    }).then(data=>{
     
        if(callback){
            callback(data);
        }
      
    })
}