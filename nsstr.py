```python
import os
from telegram.ext import Updater, CommandHandler, CallbackContext

def start(update, context):
    context.bot.send_message(chat_id=update.effective_chat.id, text="أهلاً بك! قم بإرسال /download لتحميل الملف.")

def download(update, context):
    file_url = "https://raw.githubusercontent.com/اسم-المستخدم/N/الفرع/المسار/الملف"
    file_name = "nsstr.py"

    context.bot.send_message(chat_id=update.effective_chat.id, text="جارٍ تحميل الملف...")

    os.system(f"wget {file_url} -O {file_name}")

    context.bot.send_document(chat_id=update.effective_chat.id, document=open(file_name, 'rb'))

    os.remove(file_name)

def main():
    updater = Updater(token="6534060758:AAEyI9ZlLOunnoHN2ZaKnU-xVO8fNYlQoJs", use_context=True)
    dispatcher = updater.dispatcher

    start_handler = CommandHandler('start', start)
    download_handler = CommandHandler('download', download)

    dispatcher.add_handler(start_handler)
    dispatcher.add_handler(download_handler)

    updater.start_polling()
    updater.idle()

if __name__ == '__main__':
    main()
