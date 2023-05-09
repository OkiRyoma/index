squares = [value**2 for value in range(1,11)]
print(squares)

zzz = [i*10 for i in range(1,11)]
print("①")
print(zzz)
print("②")
players = ["charlse","martina","michael","florence","eli"]
print("1",players[0:3])
print("2",players[1:4])
print("3",players[:4])
print("4",players[2:])
print("5",players[-3:])

print("③")
print("チームの最初の３人です")
for player in players[:3]:
	print(player.title())