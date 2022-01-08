 const array=[
    {
        id:1,
        image:'productSting(bottle)28.jpg',
        name:'Sting',
    },
    {
        id:2,
        image:'productSting(Can).jpg',
        name:'Sting',
    },
    {
        id:3,
        image:'productVinamilk.jpg',
        name:'Vinamilk',
    },
    {
        id:4,
        image:'productbia33.jpg',
        name:'Beer'
    },
    {
        id:5,
        image:'productAquafina.jpeg',
        name:'Aquafina'
    }
]
function check_length(e){
    (e>=array.length-1)?e=0:e++;
    return e;
}
let i=0;
    const setInter=setInterval(() => {
    $('.brands_products >.content').empty();
       $('.left-sidebar').append(`<div class="brands_products">
       <div class="content">
       <h2>Advertising</h2>
       <div class="brands-name">
           <ul class="nav nav-pills nav-stacked" style="display:flex">
               <li><a href=""><img src="backend/uploads/product/${array[i]['image']}" alt="" width="120"
               height="auto" /></a>
               </li>
               <li>
                    <h3>Sale up 50%</h3>
                    <p>${array[i]['name']}</p>
               </li>
           </ul>
       </div>
       </div>
    </div>`);
    i=check_length(i);
    }, 3000);
    $('.brands_products >.content').empty();

// clearInterval(setInter);