# TFAT - Transcription Factor Analysis Toolkit
Created by Lucas Felipe

The TFAT (TRANSCRIPTION FACTOR ANALYSIS TOOLKIT) web tool provides access to the collected FT data, allowing:

- TF Enrichment: The analysis and identification of the TF associated with a list of genes;
TF Check: Check of a list of TF;
- TF Prediction: Prediction using HOCOMOCO PWMs for DNA sequences;
- Custom configurations by the user in their queries such as the degree of scalable precision of the TF, tissue expression, data contained in public databases, ChIP-seq experiments and prediction;
- Filters integrated into the results;

In our database, we collected a total of 16.462.707 associations between the transcription factor and gene, with 26.065 target genes and 1.172 transcription factors. These data are derived from several tools, classified into three methodologies: public databases, CHIP-Seq experiments and PWM predictions. These are six libraries that allow us to identify the enrichment Transcription Factors of a list of genes using as data source Enrichr, HTRIdb, UCSC/ENCODE, GTRD, ChIP-Atlas and HOCOMOCO PWMs.

This is an alternative that integrates several data sources, from the most diverse methodologies on FT, making it complement the existing proposals for TF enrichment analysis.

## Software Required:

### PHP 7.2 Server
- Recommended: [Apache HTTPD 2.4](https://httpd.apache.org/download.cgi#apache24)
### Database Server: 
- MariaDB 5.5 ([download here](https://downloads.mariadb.org/mariadb/5.5.58/))
### Python 2.7:
- With SciPy package installed

## Configuration

### Edit the information in the 'model/TFATConfig.php' file:
```php
function getTFATServerAddress(){
    return "127.0.0.1";
}

function getPythonPath(){
    return "python";
}

function getMysqli(){
    $mysqlUser = "<insert_username>";
    $mysqlUserPasswd = "<insert_password>";
    $dbName = "tfat_db";
    $mysqlAddress = "127.0.0.1";

    $mysqli = new mysqli($mysqlAddress, $mysqlUser, $mysqlUserPasswd, $dbName);
    return $mysqli;
}
```

### Create the database
The SQL script 'create_db.sql' creates a database named 'tfat_db' with all the information required for the TFAT server.
Download it [here](https://drive.google.com/open?id=1nq-7MCulL4vXqCA7ollBt8jzmIU4SGMd) (475M)
