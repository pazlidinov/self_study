"""
This is a echo bot.
It echoes any incoming text messages.
"""

import logging

from aiogram import Bot, Dispatcher, executor, types
from googletrans import Translator
translator = Translator()

API_TOKEN = '5144558662:AAHbrOh5aePDqjnUMuOccWU7F1E-shYEm0c'

# Configure logging
logging.basicConfig(level=logging.INFO)

# Initialize bot and dispatcher
bot = Bot(token=API_TOKEN)
dp = Dispatcher(bot)


@dp.message_handler(commands=['start', 'help'])
async def send_welcome(message: types.Message):
    """
    This handler will be called when user sends `/start` or `/help` command
    """
    await message.answer("Hi!\nI'm EchoBot!\nPowered by aiogram.")


@dp.message_handler()
async def echo(message: types.Message):      
    a= translator.detect(message.text).lang    
    if len(message.text.split()>2):    
        dest = 'uz' if a == 'en' else 'en'
        await message.reply(translator.translate(message.text, dest='uz').text)
        print('ok')
    else:
        await message.reply('xatolik!')
        
        
if __name__ == '__main__':
    executor.start_polling(dp, skip_updates=True)
