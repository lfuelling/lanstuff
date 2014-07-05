lanstuff
========

Website I will use for the LAN Party on my birthday.

It features:
- awesome design
- background video
- local network mode (no internet access needed)

It's designed to run on a small server which has a basic webserver with PHP running. If you want to see it, you can check it out [here](http://d4rkn3t.net/lanstuff/). 

## Concept for the LAN Party

I thought about a better way of sharing games at a LAN Party than handing arount a few external HDDs all the time. My solution is called [BitTorrent](http://de.wikipedia.org/wiki/BitTorrent). Because it's damn fast even when only 3-4 PCs are seeding on a Gbit/s network. 

### So here's my concept how to run this whole thing:

1. People have to connect external drives containing the games to the server.
2. Serveradmin creates torrent files for the games and drops them in the "torrents" folder in the web directory.
3. People open up this website, download uTorrent, the Torrents and start downloading/sharing the games you are going to play.
