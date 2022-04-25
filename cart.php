<div>  
    <div v-if="cartReady" >    
        <div class="fixed inset-0 z-50">
            <!-- Overlay -->
            <div class="overlay absolute hidden h-full w-full md:block" style="background: rgba(0,0,0,.1)">
            <!-- Panel -->
            <div class="panel absolute right-0 h-full w-full max-w-md">
                <div class="h-full w-full overflow-y-scroll bg-white px-4 pt-4">
                    <button @click="cartReady = !cartReady" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full pt-1">Close</button>
                    <p>Hello world!</p>
                    <p>Hello world!</p>
                    <p>Hello world!</p>
                    <p>Hello world!</p>
                <shopping-cart inline-template :items="cartItems">
                    <div v-if="items.length > 0">               
                    <!-- ################################################################# >> -->
                    <div class="card">
                        <div class="row">
                        <div class="col-md-12 cart">
                            <div class="title">
                                <div class="row">
                                    <div class="col">
                                        <h4><b>Shopping Cart</b></h4>
                                    </div>
                                    <div class="col align-self-center text-right text-muted">{{ items.length }} items</div>
                                </div>
                            </div>
                            <div class="row border-top border-bottom" v-for="(item, index) in items">
                                <div class="row main align-items-center">
                                    <div class="col-2">                                  
                                        <img class="img-fluid" :src="item.product.images && item.product.images[0].file.url" alt="">
                                    </div>
                                    <div class="col">
                                        <small class="row font-bold-9">{{ item.product && item.product.name }}</small>
                                        <div class="row text-muted font-bold-9">Taglia: {{ item.options.filter( x => x.name === 'Taglia')[0].value }}</div>
                                        <div class="row text-muted font-bold-9">Colore: {{ item.options.filter( x => x.name === 'Colore')[0].value }}</div>
                                        <div class="row text-muted font-bold-9">Minuteria: {{ item.options.filter( x => x.name === 'Minuteria')[0].value }}</div>
                                    </div>
                                    <div class="col d-flex justify-content-center"> 
                                        <button @click="updateProduct(item.id, item.quantity-1)" :class='{"blur": !(item.quantity*1-1)}'>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                        </svg>
                                        </button>
                                        <button class="border">{{ item.quantity }}</button>
                                        <button @click="updateProduct(item.id, item.quantity+1)"><!-- +1 -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                        </svg>
                                        </button> 
                                    </div>
                                    <div class="col d-flex">
                                        <h6 class="m-0">{{ item.price }} {{ currency }}</h6>
                                        <button @click="removeProduct(index, item.id)">                          
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                        <div class="col-md-12 summary">
                            <div>
                            <h5><b>Summary</b></h5>
                            </div>
                            <hr>
                            <div class="row">
                            <div v-show="items.length === 0" class="col-12">
                                <h4 class="text-center">Cart is empty</h4>
                            </div>
                            <div v-show="items.length > 0" class="col-12">                      
                                <h6>Discount: {{ discount_total | formatCurrency }} {{ currency }}</h6>
                            </div>
                            <div v-show="items.length > 0" class="col-12">                      
                                <h6>Sub-Total: {{ sub_total | formatCurrency }} {{ currency }}</h6>
                            </div>
                            <div v-show="items.length > 0" class="col-12">                      
                                <h6>Grand-Total: {{ grand_total | formatCurrency }} {{ currency }}</h6>
                            </div>
                            <div v-if="Object.keys(shipping).length">                      
                                <h6>Shipping: {{ shipping }}</h6>                   
                            </div>
                            </div>
                        </div>
                        </div>              
                    </div>
                    <!-- << ################################ -->

                    </div>              
                </shopping-cart>  

                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<script>
// The shopping cart component
Vue.component('shopping-cart', {
  props: ['items'], 

  computed: {
    sub_total() {  

      let total = 0;
      this.items.forEach(item => {
        total += item.price * item.quantity;         
      });     

      return total;
    },

    grand_total(){
      let total = 0;
      this.items.forEach(item => {        
        total += item.price * item.quantity - ( item.discount_each * item.quantity );
      });
      return total; 
    },

    discount_total(){
      let total = 0;
      this.items.forEach(item => {
        total += item.discount_each * item.quantity;        
      });
      return total; 
    }

  },
  
  methods: {
    // Remove item by its product ID    
    removeProduct(index, pid) {
      
      this.items.splice(index, 1);
      let xx = vm;
      try{
        swell.cart.removeItem(pid).then( res => { 
             
            xx.shipping       = res.shipping;      
            xx.cartItems      = res.items;
            xx.currency       = res.currency;
            xx.sub_total 	    = res.sub_total,
            xx.grand_total 	  = res.grand_total,
            xx.discount_total = res.discount_total

          }); 
      }catch( error ){
        console.log(error);
      }
    },

    updateProduct(pid, count){      
      let xx = vm;      
        swell.cart.updateItem(pid, {
          quantity: count
        }).then( res => {
          
          xx.shipping       = res.shipping;      
          xx.cartItems      = res.items;
          xx.currency       = res.currency;
          xx.sub_total 	    = res.sub_total,
          xx.grand_total 	  = res.grand_total,
          xx.discount_total = res.discount_total
        }
      );
    } 
  } 

});


// const vm = new Vue({
//   el: '#app',
//   data: {
//     cartItems: [],
//     items: [],
//     cartReady: false, 
//     quantity: 0,
//     currency: 'Euro',
//     sub_total: 0,
//     grand_total: 0,
//     discount_total: 0,
//     shipping: {}
//   }, 

//   methods: {
//     // Add Items to cart
//     addToCart(item, cls) {       
      
//       let qty = document.querySelector(`.${cls}`).value;
//       if(!qty){
//         alert('Qty should be over 1'); return;
//       } 

//       let taglia    = item.options.filter( x => x.name === 'Taglia')[0].values[0].name;
//       let colore    = item.options.filter( x => x.name === 'Colore')[0].values[0].name;
//       let minuteria = item.options.filter( x => x.name === 'Minuteria')[0].values[0].name;
      
//       let xx = this;     
//       window.swell.cart.addItem({
//           product_id: item.id,
//           quantity: qty*1,
//           options: {
//             taglia:    taglia,
//             colore:    colore,
//             minuteria: minuteria
//           }
//         }).then( res => {    
                
//           xx.shipping       = res.shipping;      
//           xx.cartItems      = res.items;
//           xx.currency       = res.currency;
//           xx.sub_total 	    = res.sub_total;
//     		  xx.grand_total 	  = res.grand_total;
// 			    xx.discount_total = res.discount_total;
//         });            
//       this.cartReady = true;
//     } 
//   },  
//   computed: {
//     quantity: function(e){      
//     }
//   }
// });
</script>