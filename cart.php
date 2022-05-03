<div>  
    <div v-if="cartReady" >    
        <div class="fixed inset-0 z-50">
            <!-- Overlay -->
            <div class="overlay absolute hidden h-full w-full md:block" style="background: rgba(0,0,0,.1)">
            <!-- Panel -->
            <div class="panel absolute right-0 h-full w-full max-w-md">
                <div class="h-full w-full overflow-y-scroll bg-white px-6 pt-4">
                    
                  <button @click="cartReady = !cartReady" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full pt-1">Close</button>

                  <div v-if="cartItems.length > 0 && !isEmpty(product)" class="pt-4">               
                    <!-- product ################################################################# >> -->
                    <div class="w-100 px-1" v-for="(item, index) in cartItems" :key="index">                                     
                      
                      <!-- <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5"> -->
                      <div class="w-100 items-center hover:bg-gray-100 -mx-8 px-6 py-5">                          
                        <div class="flex w-5/5 pb-1">
                          <span class="font-bold text-sm">{{ product.node.title }} -- {{  item.node.merchandise.title.replace('Default Title', '') }}</span>
                        </div>
                        <div class="flex items-center">
                          <div class="flex w-2/5"> 
                            <div class="w-20">                              
                              <img class="h-24" :src="item.node.merchandise.image.url" alt="">
                            </div>
                            <div class="flex flex-col justify-between ml-4 flex-grow">                            
                              <span class="text-red-500 text-xs">{{ item.node.merchandise.title.replace('Default Title', '') }}</span>
                              <!-- Remove icon >> ################################################################ -->
                              <svg @click="updateCart(item.node.id, 0); loading=true" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                              </svg>
                            </div>
                          </div>
                          <div class="flex justify-center w-1/5">                          
                            <svg @click="updateCart(item.node.id, item.node.quantity-1); loading=true" class="fill-current text-gray-600 w-4 cursor-pointer" viewBox="0 0 448 512">
                              <path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                            </svg>

                            <label class="mx-2 border text-center w-8" type="text">{{ item.node.quantity }}</label>

                            <svg @click="updateCart(item.node.id, item.node.quantity+1); loading=true" class="fill-current text-gray-600 w-4 cursor-pointer" viewBox="0 0 448 512">
                              <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                            </svg>                          
                          </div>
                          <span class="text-center w-1/5 font-semibold text-sm">{{ item.node.merchandise.priceV2.amount }} {{ currency }}</span>
                          <span class="text-center w-1/5 font-semibold text-sm">{{ item.node.merchandise.priceV2.amount*item.node.quantity }} {{ currency }}</span>
                        </div>
                      </div>
                    </div>
                    <!-- ##############################  >> -->
                    <div class="card">
                      <div class="w-100 summary">
                        <div><h5><b>Summary</b></h5></div>
                        <hr>
                        <div class="w-100 pt-4" >
                          <div v-if="loading">
                            <svg v-if="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;" width="48px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                              <g transform="rotate(0 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d">
                                  <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite"></animate>
                                </rect>
                              </g><g transform="rotate(30 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d">
                                  <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite"></animate>
                                </rect>
                              </g><g transform="rotate(60 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d">
                                  <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite"></animate>
                                </rect>
                              </g><g transform="rotate(90 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d">
                                  <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite"></animate>
                                </rect>
                              </g><g transform="rotate(120 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d">
                                  <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite"></animate>
                                </rect>
                              </g><g transform="rotate(150 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d">
                                  <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite"></animate>
                                </rect>
                              </g><g transform="rotate(180 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d">
                                  <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite"></animate>
                                </rect>
                              </g><g transform="rotate(210 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d">
                                  <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite"></animate>
                                </rect>
                              </g><g transform="rotate(240 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d">
                                  <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite"></animate>
                                </rect>
                              </g><g transform="rotate(270 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d">
                                  <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite"></animate>
                                </rect>
                              </g><g transform="rotate(300 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d">
                                  <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite"></animate>
                                </rect>
                              </g><g transform="rotate(330 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fe718d">
                                  <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animate>
                                </rect>
                              </g>
                            </svg>
                          </div>
                          <div v-else>
                            <div v-show="cartItems.length === 0" class="col-12">
                                <h4 class="text-center">Cart is empty</h4>
                            </div>
                            <div v-show="estimatedCost.totalTaxAmount" class="col-12">                      
                                <h6>Tax: {{ estimatedCost.totalTaxAmount | formatCurrency }} {{ currency }}</h6>
                            </div>
                            <div v-show="cartItems.length > 0" class="col-12">                      
                                <h6>Sub Total: {{ estimatedCost.subtotalAmount.amount | formatCurrency }} {{ estimatedCost.subtotalAmount.currencyCode }}</h6>
                            </div>
                            <div v-show="cartItems.length > 0" class="col-12">                      
                                <h6>Grand Total: {{ estimatedCost.totalAmount.amount | formatCurrency }} {{ estimatedCost.totalAmount.currencyCode }}</h6>
                            </div>
                          </div>
                          <div v-if="checkoutUrl" class="mx-auto text-center mt-8">
                            <a :href="checkoutUrl" class="bg-gray-700 hover:bg-gray-800 text-white font-bold py-3 px-16 pt-2 cursor-pointer">CHECKOUT</a>                                
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- << ################################ -->
                  </div>
                  <div v-else class="text-center pt-4">
                    <h4 class="text-3xl font-normal leading-normal mt-0 mb-2 text-slate-800">
                      Empty Cart!
                    </h4>
                  </div>      

                </div>
              </div>
            </div>
        </div>
    </div>
</div>