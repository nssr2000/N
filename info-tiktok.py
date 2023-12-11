import requests

# = = = = = = = = = = = = 
Z = '\033[1;31m' #احمر
X = '\033[1;33m' #اصفر
Z1 = '\033[2;31m' #احمر ثاني
F = '\033[2;32m' #اخضر
A = '\033[2;34m'#ازرق
C = '\033[2;35m' #وردي
B = '\033[2;36m'#سمائي
Y = '\033[1;34m' #ازرق فاتح
# = = = = = = = = = = = =

user = input(Y+" ⌯ send user tiktok: ")
api = requests.get(f"https://api.dlyar-dev.tk/info-tiktok?user={user}").json()
print(X)
os.system("clear")
if api['status'] == True:
 name = api['name']
 flors = api['followers']
 flong = api['following']
 like = api['likes']
 language = api["language"]
 country = api["country"]
 flag = api["flag"]
 print(f' user => {user}\n Name => {name}\n Followers => {flors}\n Following => {flong}\n Like => {like}\n Language => {language}\n country => {country}\n flag => {flag}\n\n @EEKMM')
 
elif api["message"] == "not found user":
 print(Z+"Not Found User !")
 os.exit()
else:
 print("Error!")