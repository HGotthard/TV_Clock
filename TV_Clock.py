import cec
import time

def __init__(self):
	cec.init()
	tv = cec.Device(cec.CECDEVICE_TV)
	
def clock(self):

def startTv(self):
	tv.power_on()
	
	
def music(self):

	pygame.mixer.init()
	
	playlist = list()
	playlist.append ( "music/music (1).mp3" )
	playlist.append ( "music/music (2).mp3" )
	playlist.append ( "music/music (3).mp3" )


	song = playlist.pop()
	print "Loading song: {}".format(song)
	pygame.mixer.music.load ( song )  # Get the first track from the playlist
	song = playlist.pop()
	print "Queuing song: {}".format(song)
	pygame.mixer.music.queue ( song ) # Queue the 2nd song
	pygame.mixer.music.set_endevent ( pygame.USEREVENT )    # Setup the end track event
	print "Playing first track"
	pygame.mixer.music.play()           # Play the music

	running = True
	
	while running:
		for event in pygame.event.get():
			if event.type == pygame.USEREVENT:    # A track has ended
				print "Track has ended"
			if playlist:       # If there are more tracks in the queue... (A non-empty list is True)
				print "Songs left in playlist@ {}".format(len(playlist))
				song = playlist.pop()
				print "Queuing next song: {}".format(song)
				pygame.mixer.music.queue ( song ) # Queue the next one in the list
			else:
				print "Playlist is empty"


