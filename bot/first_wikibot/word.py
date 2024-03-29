"""
This is a echo bot.
It echoes any incoming text messages.
"""

import logging

from aiogram import Bot, Dispatcher, executor, types
from checked import check_word

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
    result = check_word(message.text)
    if result['avialable']:
        answer = result['matches']
    else:
        ans = f'x {message.text.capitalize()}\n'
        for item in result['matches']:
            ans += f'>>> {item.capitalize()}\n'
    await message.answer(ans)
    
    
if __name__ == '__main__':
    executor.start_polling(dp, skip_updates=True)
