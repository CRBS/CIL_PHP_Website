<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <img src="/pix/auto_chromosome_dectection.png" width="100%" />
                </div>
                <div class="col-md-12">
                    <img src="/pix/auto_chromosome_dectection2.png" width="100%" />
                </div>
                <div class="col-md-12">
                    <img src="/pix/auto_chromosome_dectection3.png" width="100%" />
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="row">
            <div class="col-md-12">
                <div class="cil_title">
                    Automatic chromosome detector
                </div>
            </div>
            <div class="col-md-12">
            <br/>
            <span class="cil_14_bold_no_color">Description of biological application</span>
            </div>
            <div class="col-md-12">
                <span class="cil_13_no_color">
                Chromosomes are intracellular aggregates carrying genetic information in genes, which are major objects of study in biological cytogenetics. Chromosome screening is an important part of prenatal care. Manual identification is time consuming and costly (each image takes at least 15 minutes). We have developed an artificial intelligence (AI) model for the automatic chromosome detector based on metaphase cell images using deep learning technology. Moreover, we want to provide the chromosome images and annotations (labels) used to develop the AI model. As far as we know, this is the first publicly available database with the largest number of images and types of labels. The database contains 5,000 metaphase cell images, and each image contains 46 chromosomes (23 pairs). Moreover, the dataset has three different types of annotations: 1). 229,852 object annotations (bounding box) for 24 different chromosomes, 2). 2,000 annotations for a single chromosome, and 3). 5000 pixel-level labels for a single chromosome segmentation. The dataset will be a good performance benchmark for researchers in this field and facilitate the speed and technology development in this application area.
                </span>
            </div>
            <div class="col-md-12">
                <br/><br/>
            </div>    
            <div class="col-md-12">
                <div class="cil_title">
                   Technical details
                </div>
            </div>
            <div class="col-md-12">
                <span class="cil_13_no_color">
                    We use in-situ harvest method and trypsin/Wright stain procedure to prepare G-banding. Briefly, the amniotic cells were cultured in BIO-AMF medium (Biological industrial, Beit-Haemek, Israel) for 6 to 8 days.Treating cells with colcemid (NY, USA, Gibco) for 30 min to arrest cells at metaphase. Swell cells with hypotonic solution and fix with methanol/acetic acid mixture. Fixed cells were treated with tryspin then stained with Wright stain solution (MO, Sigma-Aldrich). The karyotype was interpreted according to The International System for Human Cytogenomic Nomenclature (ISCN). <br/><br/> See also: M. J. Barch, T. Kuntsen and J. L. Spurbeck, The AGT Cytogenetics Laboratory Manual, Lippincott-Raven (1997). Yunis J. High resolution of human chromosome. Science 1976: 191:1268-1270. J. McGowan-Jordan, A.
Sim+A13ons and M. Schmid. An International System for Human Cytogenetic Nomenclature. KARGER (2016).
                    <br/><br/>
                    <b>Weight:</b><br/>
                    Two pre-training models, "best_single_chromosomes.pt" and "best_24_chromosomes.pt", 
                    are provided for training with YOLOv4.
                    <br/><br/>
                    We recommend using argusswift's YOLOv4_pytorch program to operate.<br/>
                    <a  href='https://github.com/argusswift/YOLOv4-pytorch' target='_blank'>https://github.com/argusswift/YOLOv4-pytorch</a>
                    <br/><br/>
                    <table class='table-striped'>
                        <tr>
                            <td><b>Pretrained model</b></td>
                            <td><b>Datasets</b></td>
                            <td><b>mAP50</b></td>
                        </tr>
                        <tr>
                            <td>best_single_chromosomes.ptt</td>
                            <td>2000</td>
                            <td>96.5</td>
                        </tr>
                        <tr>
                            <td>best_24_chromosomes.pt</td>
                            <td>2000</td>
                            <td>90.8</td>
                        </tr>
                    </table>
                    <br/><br/>
                    <b>Train & test</b><br/>
                    We have provided the file names for the training and test sets. ("train.txt" "test.txt")
                    <br/><br/>
                    <b>Diffcult image:</b><br/>
                    The images of the 24 chromosome annotations were evaluated according to the rules, "diff_image.txt" contains the filenames of all difficult images.
                </span>
            </div>
                
            <div class="col-md-12">
            <br/><br/>
            <span class="cil_title2">Licensing</span>
            <div class="row">
                <div class="col-md-2">
                    <img src="/pic/attribution_cc_by.png">
                </div>
                <div class="col-md-10">
                    <div class="licensing_details_text_container">
                    <b>Attribution Only:</b> This image is licensed under a Creative Commons Attribution License.  <a href="http://creativecommons.org/licenses/by/3.0" class="license_view_links" target="_blank">View License Deed</a> | <a href="http://creativecommons.org/licenses/by/3.0/legalcode" class="license_view_links" target="_blank">View Legal Code</a>
                    </div>
                </div>
            </div>
            <br/><br/>
            </div>
                
            <div class="col-md-12">
                <br/><br/>
                <center><a href='/images/54816' target='_self' class='btn btn-primary'>Download dataset</a></center>
                <br/><br/>
            </div>
            </div>
        </div> 
    </div>  
</div>