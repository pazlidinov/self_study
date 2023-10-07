"""
This is a echo bot.
It echoes any incoming text messages.
"""

import logging

from aiogram import Bot, Dispatcher, executor, types
import wikipedia

API_TOKEN = '5144558662:AAHbrOh5aePDqjnUMuOccWU7F1E-shYEm0c'
wikipedia.set_lang('uz')
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
    try:
        print(message)
        respons = wikipedia.summary(message.text)
        await message.answer(respons)
    except:
        await message.answer('Bunday maqola mavjud emas!')

if __name__ == '__main__':
    executor.start_polling(dp, skip_updates=True)
