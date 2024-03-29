<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>radice JS</title>	
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="https://unpkg.com/vue@2.6.14/dist/vue.min.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script>

		/** VERSION custom Graphql call 
		 *
		 * Some product IDs
		 * 
		 * 	7617693745394'; // fusilloni all'albume
		 * 	7625131360498'; // product with no stock monitoring
		 * 	7633154572530'; // product with stock monitoring
		 * 	7633153425650'; // product with variants
		 *
		 */
		//  let shopifyID = 7633153425650;
		
		// working -- https://www.christhefreelancer.com/shopify-storefront-api/				
</script>

</head>
<body class="bg-slate-50">	
	<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
		<div class="container flex flex-wrap justify-between items-center mx-auto">
			<a href="https://flowbite.com" class="flex items-center">				
				<span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Radice</span>
			</a>
			<button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu" aria-expanded="false">
				<span class="sr-only">Food</span>
				<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
				<svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
			</button>
			<div class="hidden w-full md:block md:w-auto mr-32" id="mobile-menu">
				<ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
					<li>
						<a href="#" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">BEVERAGE</a>
					</li>
					<li>
						<a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">LIFESTYLE</a>
					</li>
					<li>
						<a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">BEAUTY</a>
					</li>
					<li>
						<a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">ABOUT</a>
					</li>
					<li>
						<a href="#" class="block py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">JOURNAL</a>
					</li>
					<div>						
						<button class="cart-link cursor-pointer" onclick="vm.cartReady=true;">
							<i class="fa fa-shopping-cart">							
								<span class="cart-counter">									
									<span id="cart-counter">0</span>
								</span>
							</i>
						</button>					
					</div>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container mx-auto px-16 pt-4 bg-slate-200 pb-32">
		<div id="app" class="hidden">
			<div class="absolute shopping-cart">						
				<!-- <button class="cart-link cursor-pointer" @click="cartReady=true;">
					<i class="fa fa-shopping-cart">							
						<span style="" class="cart-counter">
							<span>{{ cartItems.length }}</span>
						</span>
					</i>
				</button>					 -->
			</div>			
			<div class="grid grid-cols-2" v-if="!isEmpty(product)">
				<div class="w-50">
					<!-- selected Product preview -->
					<div class="w-100">						
						<img :src="sltObject.node.image.url" class="p-8 m-auto" style="max-height: 600px;"/>						
					</div>

					<div class="w-1/2 flex mx-auto">
						<div class="flex-auto" v-for="(item, key) in product.node.variants.edges" :key="key">
							<img :src="item.node.image.url" @click="sltObject = item" class="m-auto cursor-pointer" style="max-height: 150px;"/>
						</div>
					</div>
				</div>
				<div class="w-50">
					<h2 class="font-extrabold">{{ product.node.title }}</h2>
					<div class="w-100">
						<h3>250g</h3>
						<p>Trioritoe non pediand oepudispum sitatia apis as mossi officia ... PHP part</p>
					</div>
					<!-- Product variants ########################### >> -->
					<div class="flex pt-32">
						<div class="w-1/2">
							<h6 v-if="isVariantShow" class="border-b-4 border-indigo-500 font-bold">{{ product.node.options[0].name }}</h6>
							<div v-if="isVariantShow" class="flex justify-start pt-4">							
								<div class="form-check-inline flex-1" v-for="(item, key) in product.node.variants.edges" :key="key">
									<input 	class="form-check-input appearance-none rounded-full h-5 w-5 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain mr-2 cursor-pointer" 
											type="radio" 
											name="flexRadioDefault" 
											@change="sltObject = item"
											:id='`flexRadioDefault${key}`' :checked='item.node.title === sltObject.node.title' >
									<label class="form-check-label block text-gray-800 cursor-pointer pt-1" :for="`flexRadioDefault${key}`">
										{{ item.node.title }}
									</label>
								</div>														
							</div>
							<div class="flex pt-8">
								<div class="w-1/2">
									{{ sltObject.node.priceV2.amount }} Euro
								</div>							
							</div>
						</div>
						<div v-if="isStockShow" class="w-1/2 pt-32 text-center">
							{{ product.node.totalInventory }} in Stock							
						</div>
					</div>
					<div v-if="isStockShow" class="w-100 pt-8">
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
								@click="addToCart(sltObject.node.id, 1); cartReady=true;">
							Add to cart
						</button>
					</div>
				</div>
			</div>
			<?php include 'cart.php' ?>
		</div>
	</div>
	<!-- cart page >> -->
</body>
<!-- >> -->
<script>
setTimeout(() => {	
	document.getElementById("app").classList.remove("hidden");
}, 500);
/**
 * VM instance load...
 */
 const vm = new Vue({
  el: '#app',
  data: {
	shopifyID:7619001975026,	    
    items: [],
    cartReady: false, 
    quantity: 0,
    currency: 'EUR',
    sub_total: 0,
    grand_total: 0,
    discount_total: 0,	
	total_tax: 0,
    shipping: {},
	product: {},
	sltObject: {},
	cartItems: [],	
	checkoutUrl: '',
	estimatedCost: {},		
	loading: false,
	lang: 'IT',
	isVariantShow: true,
	isStockShow: false,
	wrapper: false,
	gp_id: 'gid://shopify/ProductVariant/43661434126578',
  }, 
  mounted() {
	
	this.shopifyID && this.getProduct(this.shopifyID);
	getCookie('cartID') && this.retrieve( getCookie('cartID') );
	//		
	document.getElementById('cart-counter').innerText = this.cartItems.length;	
  },
  methods: {
	async getProduct(id) { 
		
		const query = `
			query products @inContext(language: ${this.lang})
			{				
			  products(first: 1, query: "id:${id}") {
			    edges {
			      node {
			        title
			        id
			        tags
			        totalInventory
			        priceRange {
			          maxVariantPrice {
			            amount
			          }
			          minVariantPrice {
			            amount
			          }
			        }
			        collections(first: 5) {
			          edges {
			            node {
			              id
			              title
			            }
			          }
			        }
			        images(first: 1) {
			          edges {
			            node {
			              src
			              altText
			            }
			          }
			        }
			        options(first: 10) {
			          values
			          name
			        }
			        variants(first: 10) {
			          edges {
			            node {
			              id
			              title
			              priceV2 {
			                amount
			              }
			              image {
			                url
			              }
			              selectedOptions {
			                name
			              }
			            }
			          }
			        }
			      }
			    }
			  }
			}
		`; 				
		const response = await fetch('https://radicex.myshopify.com/api/2022-04/graphql.json', 
			{ 
				method: 'POST', 
				headers: { 
					'Content-Type': 'application/graphql', 
					'X-Shopify-Storefront-Access-Token': "8300d91d004983dbec524bf265e21c13" 
				}, 
				"body": query 
		});
		
		const data = await response.json();		
		
		this.product = data.data ? data.data.products.edges[0] : {};
		this.sltObject = !this.isEmpty(this.product) ? this.product.node.variants.edges[0] : {};

	},
	async updateCart(cartlineId, qty){
		
		query = `
			mutation {
				cartLinesUpdate(
					cartId: "${getCookie('cartID')}"
					lines: {
					id: "${cartlineId}"
					quantity: ${qty}
					}
				) {
					cart {
						checkoutUrl													
						id
						createdAt
						updatedAt
						lines(first: 10) {
							edges {
								node {
								id
								quantity
								merchandise {
									... on ProductVariant {
										id
										title
										priceV2 {
											amount
										}
										image {
											url
										}
									}
								}
								attributes {
									key
									value
								}
								}
							}
						}
						attributes {
							key
							value
						}
						estimatedCost {
							totalAmount {
								amount
								currencyCode
							}
							subtotalAmount {
								amount
								currencyCode
							}
							totalTaxAmount {
								amount
								currencyCode
							}
							totalDutyAmount {
								amount
								currencyCode
							}
						}
						buyerIdentity {						
							customer {
								id
							}						
						}										
					}
				}
			}`;
		
		const response = await fetch('https://radicex.myshopify.com/api/2022-04/graphql.json', 
		{ 
			method: 'POST', 
			headers: { 
				'Content-Type': 'application/graphql', 
				'X-Shopify-Storefront-Access-Token': "8300d91d004983dbec524bf265e21c13" 
			}, 
			"body": query 
		});

		const data = await response.json();
		
		this.mutateInit(data.data.cartLinesUpdate.cart);		
		this.loading=false
	},
	async addToCart(pid, qty){
		
		let onCart = this.cartItems.filter( x => x.node.merchandise.id === pid);

		if(onCart.length){// update cart

			this.updateCart(onCart[0].node.id, onCart[0].node.quantity+1); return;

		}else if(!getCookie('cartID')){//New cart	

			
			query = `
				mutation {
					cartCreate(
						input: {
						lines: [
							{
							quantity: 1
							merchandiseId: "${pid}"
							}
						]
						attributes: { key: "cart_attribute", value: "This is a cart attribute" }
						}
					) {
						cart {
							checkoutUrl													
							id
							createdAt
							updatedAt
							lines(first: 10) {
								edges {
									node {
									id
									quantity
									merchandise {
										... on ProductVariant {
											id
											title
											priceV2 {
												amount
											}
											image {
												url
											}
											
										}
									}
									attributes {
										key
										value
									}
									}
								}
							}
							attributes {
								key
								value
							}
							estimatedCost {
								totalAmount {
									amount
									currencyCode
								}
								subtotalAmount {
									amount
									currencyCode
								}
								totalTaxAmount {
									amount
									currencyCode
								}
								totalDutyAmount {
									amount
									currencyCode
								}
							}
							buyerIdentity {						
								customer {
									id
								}						
							}						
						}						
					}
				}`;
			
			const response = await fetch('https://radicex.myshopify.com/api/2022-04/graphql.json', 
				{ 
					method: 'POST', 
					headers: { 
						'Content-Type': 'application/graphql', 
						'X-Shopify-Storefront-Access-Token': "8300d91d004983dbec524bf265e21c13" 
					}, 
					"body": query 
			});

			const data = await response.json();
			
			//Retrieve the cart content
			let cartid = data.data.cartCreate.cart.id;		
			setCookie('cartID', cartid);

			this.mutateInit(data.data.cartCreate.cart);

	  	}else{// Add cartLine			
			
			const query = `
				mutation {
					cartLinesAdd(
						cartId: "${getCookie('cartID')}",
						lines: {								
							merchandiseId: "${pid}",
							quantity: ${qty}								
						}
					){
						cart {
							checkoutUrl													
							id
							createdAt
							updatedAt
							lines(first: 10) {
								edges {
									node {
									id
									quantity
									merchandise {
										... on ProductVariant {
											id
											title
											priceV2 {
												amount
											}
											image {
												url
											}
																		
										}
									}
									attributes {
										key
										value
									}
									}
								}
							}
							attributes {
								key
								value
							}
							estimatedCost {
								totalAmount {
									amount
									currencyCode
								}
								subtotalAmount {
									amount
									currencyCode
								}
								totalTaxAmount {
									amount
									currencyCode
								}
								totalDutyAmount {
									amount
									currencyCode
								}
							}
							buyerIdentity {						
								customer {
									id
								}						
							}						
						}
						userErrors {
							field
							message
						}
					}
				}
			`;
			
			const response = await fetch('https://radicex.myshopify.com/api/2022-04/graphql.json', 
			{ 
				method: 'POST', 
				headers: { 
					'Content-Type': 'application/graphql', 
					'X-Shopify-Storefront-Access-Token': "8300d91d004983dbec524bf265e21c13" 
				}, 
				"body": query 
			});

			const data = await response.json();
			
			this.mutateInit(data.data.cartLinesAdd.cart);
		}
	},
	async retrieve(cid){
		
		const query = `
		query {
			cart(
				id: "${cid}"
			) {				
				checkoutUrl								
				id
				createdAt
				updatedAt
				lines(first: 10) {
					edges {
						node {
							id														
							quantity
							merchandise {
								... on ProductVariant {
										id
										title
										priceV2 {
											amount
										}
										image {
											url
										}
								}
							}
							attributes {
								key
								value
							}
						}
					}
				}
				attributes {
					key
					value
				}
				estimatedCost {
					totalAmount {
						amount
						currencyCode
					}
					subtotalAmount {
						amount
						currencyCode
					}
					totalTaxAmount {
						amount
						currencyCode
					}
					totalDutyAmount {
						amount
						currencyCode
					}
				}
				buyerIdentity {
				email
				phone
				customer {
					id
				}
				countryCode
				}
			}
			
		}`;

		//
		const response = await fetch('https://radicex.myshopify.com/api/2022-04/graphql.json', 
			{ 
				method: 'POST', 
				headers: { 
					'Content-Type': 'application/graphql', 
					'X-Shopify-Storefront-Access-Token': "8300d91d004983dbec524bf265e21c13" 
				}, 
				"body": query 
		});
		
		const data = await response.json();	
		this.mutateInit(data.data.cart);		
	},	
	mutateInit(data){
		
		if( !Object.keys(data).length ){
			console.log('data is empty....');
		}else{
			this.cartItems = data.lines.edges		
			this.estimatedCost = data.estimatedCost;
			this.checkoutUrl = data.checkoutUrl;
			this.currency 	 = data.estimatedCost.totalAmount.currencyCode;

			if(!this.cartItems.length){
				setCookie('cartID', '');
			}
		}
	},
	isEmpty(obj) {
		for(var prop in obj) {
			if(Object.prototype.hasOwnProperty.call(obj, prop)) {
				return false;
			}
		}
		
		return JSON.stringify(obj) === JSON.stringify({});
	}, 		   	   
	getONameByPid(productID){
		
		let pd = this.product.node.variants.edges.filter( x => x.node.id === productID);
		return !this.isEmpty(pd) ? pd[0].node.selectedOptions[0].name : '';		
	},   
	getPriceByPid(productID){
		
		let pd = this.product.node.variants.edges.filter( x => x.node.id === productID);
		return !this.isEmpty(pd) ? pd[0].node.priceV2.amount : '';		
	},
	isMobile() {
		
		let check = false;
		(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
		return check;
	},
	wrapGiftFunc(){

		let gfCart = this.cartItems.filter( x => x.node.merchandise.id === this.gp_id);

		if(!gfCart.length){

			this.addToCart(this.gp_id, 1);
		}else{

			this.updateCart(gfCart[0].node.id, 0); 			
		}
	},
	checkWrapped(){
		
		if( this.isEmpty(this.cartItems) ){
			this.wrapper = false;
		}else{
			let ww = this.cartItems.filter( x => x.node.merchandise.id === this.gp_id);
			if(ww.length){
				this.wrapper = true;
			}else{
				this.wrapper = false;
			}
		} 

	}
  },  
  computed: {
    quantity: function(e){      
    },	
  },
  watch: {	
	product: function(val){		
		this.isStockShow = val.node.totalInventory
	},
	"product.node.variants.edges": function(val){
		this.isVariantShow = (val.length && val.length > 1)
	},
	cartItems: function(val){
		
		//
		document.getElementById('cart-counter').innerText = this.cartItems.length;

		//wrapper init
		if( this.isEmpty(val) ){
			this.wrapper = false;
		}else{
			let ww = val.filter( x => x.node.merchandise.id === this.gp_id);
			if(ww.length){
				this.wrapper = true;
			}else{
				this.wrapper = false;
			}
		} 
	}
	
  }
});
// >> ######################################################
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

</script>

<style>
.cart-link i {
	position: relative;
	font-size: 26px;
}
.cart-link i .cart-counter {
    content: '';
    width: 20px;
    height: 20px;
    background: red;
    position: absolute;
    top: -10px;
    border-radius: 100%;
    right: -15px;
}
.cart-counter {
    font-size: 8px;
    font-weight: bold;
    color: white;
    position: relative;
    right: -3px;
}
.cart-counter span {
    font-family: "Roboto", sans-serif;
    text-align: center;
    border-radius: 100%;
    line-height: 20px;
    font-size: 12px;    
    margin: auto;
    display: block;
}
.shopping-cart{
	top: 10px;
    right: 100px;
}
</style>
</html>