import cec
import time
import pygame

class Setup:
	def __init__(self):
		print("init")
		cec.init()
		
		
	def main(self):
		self.startTv()
		self.music()

	def startTv(self):
		print("TV on")
		tv = cec.Device(cec.CECDEVICE_TV)
		tv.power_on()
		print("TV on")
		
		
	def music(self):
		print("Music on")

		pygame.mixer.init()
		
		playlist = list()
		playlist.append ("/home/pi/Programme/Python/Music/music (1).mp3")
		playlist.append ("/home/pi/Programme/Python/Music/music (2).mp3")
		playlist.append ("/home/pi/Programme/Python/Music/music (3).mp3")


		song = playlist.pop()
		print ("Loading song: {}".format(song))
		pygame.mixer.music.load ( song )  # Get the first track from the playlist
		song = playlist.pop()
		print ("Queuing song: {}".format(song))
		pygame.mixer.music.queue ( song ) # Queue the 2nd song
		pygame.mixer.music.set_endevent ( pygame.USEREVENT )    # Setup the end track event
		print ("Playing first track")
		pygame.mixer.music.play()           # Play the music
		
s = Setup()
s.main()