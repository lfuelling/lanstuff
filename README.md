lanstuff
========

Stuff that can be used on a LAN party.

It features:
- A website every participant can visit to get the stuff they need
- Easy setup for bittorrent to share stuff more efficiently

## Concept for the LAN Party

I thought about a better way of sharing games at a LAN Party than handing around a few external HDDs all the time, or having to connect to countless network shares. My solution is called [BitTorrent](http://de.wikipedia.org/wiki/BitTorrent) because it's damn fast even when only 3-4 PCs are seeding on a Gbit/s network. 

### So here's the concept how to run this whole thing:

1. People have to connect external drives containing the games/mods/trainers/installers to the server.
2. Server admin creates torrent files for the games and drops them in the "torrents" folder in the webapp directory.
3. People open up this website, download uTorrent, the Torrents and start downloading/sharing the games you are going to play.

## Usage

Here's a quick explanation on how to set this project up. You'll need to have [Docker](https://docker.com) installed on the server.

### Development

- Building the container: `docker build -t lfuelling/lanstuff .`
- Running the container: `docker run -it -p 8080:80 lfuelling/lanstuff`

#### TODO:
- Integrate a tracker into the Docker image
- Write a script to create torrents (favourably at build time)
