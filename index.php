<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>radice JS</title>


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
		 let shopifyID = 7633153425650;
		
		// working -- https://www.christhefreelancer.com/shopify-storefront-api/

		/*
		const query = `{ shop { name } }`; 
		function apiCall(query) { 
			return fetch('https://radicex.myshopify.com/api/2022-04/graphql.json', 
		    	{ method: 'POST', 
		          headers: { 'Content-Type': 'application/graphql', 
		                     'X-Shopify-Storefront-Access-Token': "8300d91d004983dbec524bf265e21c13" 
		                   },
		          "body": query })
		          .then(response => response.json()); } 
		apiCall(query).then(response => { console.log(response) });
		*/

		function apiCall(query) { 
			return fetch('https://radicex.myshopify.com/api/2022-04/graphql.json', 
		    	{ 
		            method: 'POST', 
		            headers: { 
		                'Content-Type': 'application/graphql', 
		                'X-Shopify-Storefront-Access-Token': "8300d91d004983dbec524bf265e21c13" 
		            }, 
		            "body": query 
		    })
		    .then(response => response.json()); 
		};

		function getProduct(shopifyID) { 
			const query = `
			{
			  products(first: 1, query: "id:7633153425650") {
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
		    return apiCall(query); 
		}

		console.log(getProduct());

</script>

</head>
<body>
	<h1>radicex js</h1>

</body>
</html>