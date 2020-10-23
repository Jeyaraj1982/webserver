lsof -ti:7860 | xargs kill -9  &> /home/tksdonlineservic/public_html/admin/1234.log  
systemctl start sshd.service