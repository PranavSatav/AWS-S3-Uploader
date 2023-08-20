
# AWS-S3-Uploader

A simple file uploader to amazon's S3 Bucket using PHP


## Steps to Run

tep 1 - Set up an AWS account: If you don't have an Amazon Web Services (AWS) account, create one at https://aws.amazon.com/

Step 2 - Goto Services and search for S3
Step 3 - Open it, Tap "Create Bucket"
- Enter Bucket Name
- Select AWS Region (In my case..I live in india, so Asia Pacific (Mumbai) for me..)
- COMPULSORY >> ACLs Enabled & Object Ownership > Object Writer
- Untick all "Block Public Access settings for this bucket" & acknowledge it - Keep other setting as it is, and tap "Create Bucket"

Step 4 - Open the Bucket, goto "Permissions Tab", Scroll down and Lookup for "Bucket Policy"

Step 5 - Edit it and Paste this into Typing Area (Policy Area) and tap "Save Changes"




```

{
    "Version": "2012-10-17",
    "Id": "S3-Console-Auto-Gen-Policy-1691067582358",
    "Statement": [
        {
            "Sid": "S3PolicyStmt-DO-NOT-MODIFY-1691067582242",
            "Effect": "Allow",
            "Principal": {
                "Service": "logging.s3.amazonaws.com"
            },
            "Action": "s3:PutObject",
            "Resource": "arn:aws:s3:::damnbruh/*"
        },
        {
            "Sid": "S3PolicyStmt-Allow-Upload",
            "Effect": "Allow",
            "Principal": "*",
            "Action": "s3:PutObject",
            "Resource": "arn:aws:s3:::damnbruh/*"
        }
    ]
}

```
(Note - In above code, you might need to change the 'damnbruh' to ur bucketname)

Step 6 - Go Down, and lookup for "Access control list (ACL)" & Grant all permissions or Read and Write (whichever can be ticked)

Step 7 - Now Goto Dashboard of aws, on top, search for "IAM" service.

Step 8 - In the IAM dashboard, click on "Users" in the left sidebar.

Step 9 - Click on the "Add user" button to create a new IAM user.

Step 10 - Provide a username for the new IAM user.
You can choose any name that helps you identify the user's purpose, such as "s3-uploader." & Press Next & Create User..

Step 11 - You will be greeted with "Access Key" & "Secret Key"
Copy it somewhere safe because those keys will be lost once you close the window.

Step 12 - Now you have your S3 Bucket created and you have your access key/secret keys...now it time to run the PHP File Locally/Hosted

Step 13 - Install XAMPP (https://www.apachefriends.org/download.html)

Step 14 - Install Composer (https://getcomposer.org/Composer-Setup.exe)

Step 15 - While installing composer, you may need to select the PHP PATH, it will automatically pop, but if it doesnt, click browse and navigate to your xampp folder, xampp/php/php.exe and select it.

Step 16 - Open XAMPP, Start Apache, and to the side, there will be "Explorer", Tap it..

Step 17 - Now open Terminal/CMD/Powershell in the folder that just opened (htdocs)

Step 18 - In terminal paste this code to install AWS SDK
```
composer require aws/aws-sdk-php
```
Step 19 - A new folder "vendor" will be created with AWS folder inside it..

Step 20 - Place the "S3-Bucket-Uploader.php" which you downloaded from GitHub into the "htdocs" folder.

Step 21 - Make sure to replace YOUR_ACCESS_KEY, YOUR_SECRET_KEY, and YOUR_BUCKET_NAME with your actual AWS credentials and bucket name (You have to change total 4 keys and 2 bucket names)

Step 22 - Goto your browser, and search 'localhost' in address bar.

Step 23 - The Project should be up and running.
