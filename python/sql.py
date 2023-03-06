import sqlite3
import requests
from bs4 import BeautifulSoup as bs

con= sqlite3.connect('football.db', check_same_thread=False)
# cur =con.cursor()

# try:
#     data=cur.execute(
#         """CREATE TABLE ufa (
#             country TEXT,
#             population TEXT,
#             area TEXT
#         )"""
#     )
# except sqlite3.DatabaseError as e:
#     print("ERROR=", e)

url='https://www.worldometers.info/geography/alphabetical-list-of-countries/'

page = requests.get(url=url)
# print(page.status_code) # if 200 its ok

if page.status_code == 200:
    parsering = bs(page.text, "html.parser")
    times = parsering.findAll("tr")
    # print(times[-1].text)
    # print(times[1].text)
    for i in times[1:]:
        info=[j.text for j in i.findAll("td")]
        try:
            cur =con.cursor()
            cur.execute(
                f"""INSERT INTO ufa
                VALUES('{info[1]}', '{info[2]}', '{info[3]}')"""
            )
        except sqlite3.DatabaseError as e:
            print("ERROR")
        else:
            con.commit()

    else:
        print("The end")
        cur.close()
        con.close()
