# GST Checker
	
When GST was first introduced, many businesses/dealers were misusing it by collecting extra amount from the customers by providing fake GST id in their invoices.
And some are still doing it! It's hard for the public to verify whether a GST number printed on the invoices were valid or not.
And recently, Kerala government has introduced a mobile app called "Kerala GST" : https://play.google.com/store/apps/details?id=nic.kerala.gst.apublic.gst_public&hl=en
So this function is based on it. 

Hope this will help someone!

*You could use this function in your free/commercial projects.*

By,
Akhilesh.B.Chandran

---
## Usage
Copy the file named **gst_checker.php** into your project. Then include the **gst_checker.php** file in your PHP page.

```
include 'gst_checker.php';
```

To get the details of a GST number, use it like this:
```
$details = checkGSTid( 'xxxxx' ); //eg: 32ABFFA5929G1ZM
if( $details !== false )	// check whether the fetching was successful
{
	var_dump( $details );
}
```
That **$details** variable will be either **FALSE** upon failure, or it will be an associative array with the details, if successful in fetching the data.

## Screenshot

![](https://i.imgur.com/EBciPRZ.png)
