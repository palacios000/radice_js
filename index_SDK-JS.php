<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>radice JS</title>

	<script src="https://sdks.shopifycdn.com/js-buy-sdk/2.0.1/index.unoptimized.umd.min.js"></script>

	<script>

	/** VERSION SHOPIFY JS SDK 
	 *  https://shopify.github.io/js-buy-sdk/
	 *
	 * Some product IDs
	 * 
	 * 	7617693745394'; // fusilloni all'albume
	 * 	7625131360498'; // product with no stock monitoring
	 * 	7633154572530'; // product with stock monitoring
	 * 	7633153425650'; // product with variants
	 *
	 */


	//Initialize the client
	var client = ShopifyBuy.buildClient({
		domain: 'radicex.myshopify.com',
		storefrontAccessToken: '8300d91d004983dbec524bf265e21c13'
	});

	/*	
	// normal JS SDK API

	// const spfID = 'gid://shopify/Product/7617693745394'; // fusilloni all'albume
	// const spfID = 'gid://shopify/Product/7625131360498'; // product with no stock monitoring
	// const spfID = 'gid://shopify/Product/7633154572530'; // product with stock monitoring
	// const spfID = 'gid://shopify/Product/7633153425650'; // product with variants

	const encodedID = btoa(spfID);
	console.log(encodedID);

	client.product.fetch(encodedID).then((product) => {
	  console.log(product);
	});
	*/


	// graphQL query
	// Build a custom products query using the unoptimized version of the SDK
	const productsQuery = client.graphQLClient.query((root) => {
		root.addConnection('products', {args: {first: 1, query: "id:7617693745394"}}, (product) => {
			product.add('title');
			product.add('publishedAt');
			product.add('tags');
			// product.add('totalInventory'); -- not working on storefront API
			// product.add('tracksInventory'); -- not working on storefront API
			product.add('vendor');
			product.addConnection('images', {args: {first: 5}}, (image) => {
				image.add('src');
				image.add('altText');
			});
			product.addConnection('collections', {args: {first: 10}}, (collection) => {
				collection.add('title');
			});
			// not working...
			product.addConnection('priceRange', (priceRange) => {
				priceRange.addConnection('minVariantPrice', (min) => {
					min.add('amount');
				});
			});
		});
	});

	// Call the send method with the custom products query
	client.graphQLClient.send(productsQuery).then(({model, data}) => {
	  // Do something with the products
	  console.log(model);
	});


</script>

</head>
<body>
	<h1>radicex js</h1>

</body>
</html>