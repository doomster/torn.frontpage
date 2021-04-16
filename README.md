###Torn frontpage

Website : [Torn Frontpage](https://torn.doomster.eu "Torn Frontpage")

## the idea:
During my gaming time in Torn, i noticed that in order to calculate the next steps of my carreer, i would have to visit several excel files that users provided. Just to get a glimpse of some basic info, i had to run around more than few different pages around the web, and eventually do calculations manually.

This idea poped up, of a single page, that would pull information from the API and do all the maths for me. Then present the data in the form of a newspaper. So when waking up in the morning, i would read my torn-paper and know what i had to do.

The main platform is setup, a basic page, that communicates with the torn API and pulls data. In order to do so, it needs to supply your API key. 

## the discussion

- ...wait what? give you my api key ?! NO WAY how do i know you dont save it somewhare and hack my torn life to the grounds? 

Well this is why this project is opensource and provided in GitHub. This way, everyone can check what it does, and how it uses your API KEY. My number one Rule: I DONT SAVE YOUR API KEY :P let me explain a bit

When you visit a site on your browser, a temporary "memory" that saves variables is created. This is called a session. Sessions dissapear (along with all the data it has saved) either when you close your browser, or when 20 minutes have passed. My tool uses Session to store your apikey, which means that if 20 minutes pass, or if you  close your browser, you will have to reprovide your API key. 

- Yeah but i dont wanna log in every time i Visit! are you stupid or something? and for sure i dont want you to save my API key on your server!

Well the solution to this is that "remember me" option next to the login button. This will enrypt the API key with a pretty strong encryption and put it **in your computer** in the form of a cookie. This way, unless you actually press the "logout" button , you will remain logged in, and still i will not have any record of your key. This cookie is saved directly into your pc/tablet/laptop/mobile phone, and the key in it is encrypted. When you revisit the page i just check for the cookie, and if it is there i store the APIKEY again in the SESSION so that you can continue.

- well thats mumble jumble to me, i dont understand it so i find it hard to believe you

This is the actual reason i have the whole project on github. you (or any of your techy friends) can review the code, and check for what i am stating.



## The sum up 

this project has just started. Feel free to contact me ingame at hexxeded [2428617] for any ideas on how to make this better, or maby bugs you might have found!

Happy gaming!

