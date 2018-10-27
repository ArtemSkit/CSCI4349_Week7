# Project 7 - WordPress Pentesting

Time spent: **15** hours spent in total

> Objective: Find, analyze, recreate, and document **five vulnerabilities** affecting an old version of WordPress

## Pentesting Report

1. WordPress <= 4.2 - Unauthenticated Stored Cross-Site Scripting (XSS)
  - [ ] Summary: 
    - Vulnerability types: XSS
    - [Detailed description](https://www.exploit-db.com/exploits/36844/)
    - Tested in version: 4.2
    - Fixed in version: 4.2.1
    ![GIF Walkthrough](./img/1.gif)
  - [ ] Steps to recreate: 
     - From the main page click on the post with open comments section
     - Scroll to the comment form and fill the fields
        - In the comment content field paste (the comment has to be at least 64kb long): 
            ```html
                <a title='x onmouseover=alert(unescape(/hello%20world/.source)) style=position:absolute;left:0;top:0;width:5000px;height:5000px  AAAAA...[64kb]..AAA'></a>
            ```
    - Post it and get approval from the admin
    - Visit the page with your comment posted
  - [ ] Affected source code:
    - [tags/4.9.8/src/wp-includes/comment.php](https://core.trac.wordpress.org/browser/tags/4.9.8/src/wp-includes/comment.php#L0)


