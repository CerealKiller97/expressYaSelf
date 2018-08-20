// Testing link api

//#region 

let axiosFunc = () => {

  axios.get('http://localhost/expressYaSelf/db/read.php')
    .then(response => {
      // handle success
      const data = response.data[0]
      const nav = document.querySelector('#main-nav')
      console.log(data)
      
      let output = ``
      data.forEach(element => {
        output += `<a class="p-2" class="text-faded" href="http://localhost/php-forum/${ element.link.toLowerCase() }">${ element.link }</a>`
      })
      //nav.innerHTML = output
      console.log(nav)
      
    })
    .catch(err => {
      // handle error
      console.log(err)
    })
    .then(function () {
      // always executed
    })
}
//#endregion 

axiosFunc()