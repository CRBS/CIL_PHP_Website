## Description
This project is funded by a grant from the National Institute of General Medical Sciences of the National Institutes of 
Health under award number 2R01GM082949. The goal of the Cell Image Library (CIL) is to create a valuable research tool 
to promote analysis and new discoveries. The CIL seeks images from all organisms, cell types, and processes, normal 
and pathological. Image quality should be as high as possible, within the limitations imposed by the then current state of readily available imaging technology 
and constraints imposed by the biological specimen.

This program implements the CIL website. The CIL website contains the features such as the general keyword search, the 
advanced ontology search, the interactive cells, and the image display. The CIL utilizes Elasticsearch as the NoSQL 
JSON search engine.  The CIL website communicates with the internal REST service API, for querying the datastore and 
tracking the statistics. The CIL is implemented in PHP. This program relies on the CodeIgniter to maintain the Model View Controller (MVC) 
programming structure.

## Dependencies
* PHP 5.4.40+
* [CodeIgniter 3.0.4](https://www.codeigniter.com/)
* Apache server 2.4


## Libraries
* PHP curl library
* [codeigniter-restserver](https://github.com/chriskacerguis/codeigniter-restserver)


## Technical details
The CIL website utilizes the CodeIgniter to the maintain the Model View Controller(MVC) structure. For example, 
the URL such as /images/18042 will first access the application/controllers/Images.php and then it will determine which
view template to load under the application/views folder. The Pages class extends CI_Controller, which is the controller 
in the MVC structure. 

The PHP file at application/controllers/CILServiceUtil2.php contains all utility functions for accessing the data through the REST API.

## Installation and configuration
See the [installation instructions](https://github.com/slash-segmentation/CIL_PHP_Website/wiki/Installation_Instruction)


## License
See [license.txt](https://github.com/slash-segmentation/CIL_PHP_Website/blob/master/license.txt)

## Bugs
Please report them [here](https://github.com/slash-segmentation/CIL_PHP_Website/issues)

## Contributing
If you would like to contribute to the CIL, please fork the repository and submit pull requests or contact us: wawong@ucsd.edu with the subject, CIL Contribution.